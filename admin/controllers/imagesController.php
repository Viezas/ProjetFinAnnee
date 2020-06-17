<?php

require 'models/Images.php';

if (!isset($_SESSION['productId'])){
    $_SESSION['productId'] = $_GET['id'];
}

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
            $productMainImages = getProductMainImages($_SESSION['productId']);
            $productSecondaryImages = getProductSecondaryImages($_SESSION['productId']);
            $view = 'views/imagesList.php';
            $pageTitle = 'Let\'s Duel ! | Images';
            $pageDescription = 'Liste tout les images liée à un produit';
            $style = 'list';
            break;

        case 'new':
            $view = 'views/imagesForm.php';
            $pageTitle = 'Let\'s Duel ! | Formulaire image';
            $pageDescription = 'Ajouter une image à unproduit';
            $style = 'form';
            break;

        case 'add':
            if (!isset($_POST['is_activated'])){
                $_POST['is_activated'] = 0;
            }
            else{
                $_POST['is_activated'] = 1;
            }
            if (!isset($_POST['is_main'])){
                    $_POST['is_main'] = 0;
            }
            else{
                $_POST['is_main'] = 1;
            }
            $insertImage = insertImage();

            if ($insertImage){
                $productMainImages = getProductMainImages($_SESSION['productId']);
                $productSecondaryImages = getProductSecondaryImages($_SESSION['productId']);
                $view = 'views/imagesList.php';
                $pageTitle = 'Let\'s Duel ! | Images';
                $pageDescription = 'Liste tout les images liée à un produit';
                $style = 'list';
            }
            else{
                $view = 'views/imagesForm.php';
                $pageTitle = 'Let\'s Duel ! | Formulaire image';
                $pageDescription = 'Ajouter une image à unproduit';
                $style = 'form';
            }
            break;

        case 'edit':
            if(!empty($_POST)){
                if (!isset($_POST['is_activated'])){
                    $_POST['is_activated'] = 0;
                }
                else{
                    $_POST['is_activated'] = 1;
                }
                if (!isset($_POST['is_main'])){
                    $_POST['is_main'] = 0;
                }
                else{
                    $_POST['is_main'] = 1;
                }
                $result = updateImage($_GET['id'], $_POST);
                $_SESSION['messages'][] = $result ? 'Image mis à jour !' : 'Erreur lors de la mise à jour !';
                header('Location:index.php?page=images&action=list');
                exit;

            }
            else{
                if (!isset($_SESSION['old_inputs'] )){
                    $image = getImage($_GET['id']);
                    if ($image==false){
                        header('Location:index.php?page=images&action=list');
                        exit;
                    }
                    $view = 'views/imagesForm.php';
                    $pageTitle = 'Let\'s Duel ! | Formulaire image';
                    $pageDescription = 'Ajouter une image à unproduit';
                    $style = 'form';
                }
                else{
                    $view = 'views/imagesForm.php';
                    $pageTitle = 'Let\'s Duel ! | Formulaire image';
                    $pageDescription = 'Ajouter une image à unproduit';
                    $style = 'form';
                }
            }

            break;

        case 'delete':

            if(isset($_GET['id'])){
                $result = delete($_GET['id']);
            }
            else{
                header('Location:index.php?page=images&action=list');
                exit;
            }

            $_SESSION['messages'][] = $result ? 'Image supprimé !' : 'Erreur lors de la suppression !';

            header('Location:index.php?page=images&action=list');
            exit;
            break;

        default :
            require 'controllers/indexController.php';
    }
}
else{
    require 'controllers/indexController.php';
}