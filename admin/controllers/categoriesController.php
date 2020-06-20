<?php
require 'models/Categories.php';

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
            $categories = getAllCategories();
            $view = 'views/categoriesList.php';
            $pageTitle = 'Let\'s Duel ! | Catégories';
            $pageDescription = 'Liste toutes les catégories';
            $style = 'list';
            break;

        case 'new':
            $view = 'views\categoryForm.php';
            $pageTitle = 'Let\'s Duel ! | Ajout d\'une catégrorie';
            $pageDescription = 'Formulaire d\'ajout d\'une catégorie';
            $style = 'form';
            break;

        case 'add':
            if(!empty($_POST)){
                if(empty($_POST['name'])){
                    $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                }
                $_SESSION['old_inputs'] = $_POST;
                header('Location:index.php?page=categories&action=new');
                exit;
            }
            else{
                $add = add($_POST);

                $_SESSION['messages'][] = $add ? 'Categorie enregistré !' : "Erreur lors de l'enregistrement de la categorie !";

                header('Location:index.php?page=categories&action=list');
                exit;
            }
            break;

        case 'edit':
            $_SESSION['category_id'] = $_GET['id'];
            if(!empty($_POST)){
                if(empty($_POST['name'])){

                    if(empty($_POST['name'])){
                        $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                    }

                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?page=categories&action=new');
                    exit;
                }
                else {
                    if (ctype_digit($_GET['id']) == $_SESSION['category_id']){
                        $result = updateCategory($_SESSION['category_id'], $_POST);
                        $_SESSION['messages'][] = $result ? 'Categorie mis à jour !' : 'Erreur lors de la mise à jour !';
                        header('Location:index.php?page=categories&action=list');
                        exit;
                    }
                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?page=categories&action=list');
                    exit;
                }
            }
            else{
                if (!isset($_SESSION['old_inputs'] )){
                    $category = getCategory($_GET['id']);
                    if ($category==false){
                        header('Location:index.php?page=categories&action=list');
                        exit;
                    }
                    $view = 'views\categoryForm.php';
                    $pageTitle = 'Let\'s Duel ! | Ajout d\'une catégrorie';
                    $pageDescription = 'Formulaire d\'ajout d\'une catégorie';
                    $style = 'form';
                }
                else{
                    $view = 'views\categoryForm.php';
                    $pageTitle = 'Let\'s Duel ! | Ajout d\'une catégrorie';
                    $pageDescription = 'Formulaire d\'ajout d\'une catégorie';
                    $style = 'form';
                }
            }

            break;

        case 'delete':

            if(isset($_GET['id'])){
                $result = delete($_GET['id']);
            }
            else{
                header('Location:index.php?page=categories&action=list');
                exit;
            }

            $_SESSION['messages'][] = $result ? 'Categorie supprimé !' : 'Erreur lors de la suppression !';

            header('Location:index.php?page=categories&action=list');
            exit;

        default:
            header('Location:index.php');
            exit();
    }
}
else{
    header('Location:index.php');
    exit();
}