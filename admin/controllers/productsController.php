<?php
require 'models/Products.php';
require 'models/Categories.php';

if (isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
            $products = getAllProducts();
            $productsCategories = getProductsCategories();
            $categories = getAllCategories();
            $view = 'views/productsList.php';
            $pageTitle = 'Let\'s Duel ! | Produits';
            $pageDescription = 'Liste tout les produits';
            $style = 'list';
            break;

        case 'new':
            $categories = getAllCategories();
            $view = 'views\productForm.php';
            $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
            $pageDescription = 'Formulaire d\'ajout d\'un produit';
            $style = 'productForm';
            break;

        case 'add':
            if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['quantity']) || empty($_POST['description'])){

                if(empty($_POST['name'])){
                    $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                }
                if(empty($_POST['price'])){
                    $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
                }
                if(!empty($_POST['price']) && intval($_POST['price']) < 0){
                    $_SESSION['messages'][] = 'Le prix ne doit pas être inférieure à 0 !';
                }
                if(!is_int($_POST['price']) || !is_float($_POST['price'])){
                    $_SESSION['messages'][] = 'Ne touchez pas au code via la console !!!';
                }
                if(empty($_POST['quantity'])){
                    $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
                }
                if(!is_int($_POST['quantity'])){
                    $_SESSION['messages'][] = 'Ne touchez pas au code via la console !!!';
                }
                if(!empty($_POST['quantity']) && intval($_POST['quantity']) < 1){
                    $_SESSION['messages'][] = 'La quantité ne doit pas être inférieure à 1 !';
                }
                if(empty($_POST['description'])){
                    $_SESSION['messages'][] = 'Le champ description est obligatoire !';
                }

                $_SESSION['old_inputs'] = $_POST;
                $categories = getAllCategories();
                $view = 'views\productForm.php';
                $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
                $pageDescription = 'Formulaire d\'ajout d\'un produit';
                $style = 'productForm';
            }
            else{
                $add = addProduct($_POST);

                if ($add){
                    $lastInsertedProductId = getLastInsertedProductId();
                    insertProductCategoriesLinks($lastInsertedProductId, $_POST['category_id']);
                    $_SESSION['messages'][] = 'Produit enregistré !';
                    header('Location:index.php?page=products&action=list');
                    exit;
                }
                else{
                    $_SESSION['messages'][] = 'Erreur lors de l\'enregistrement !';
                    header('Location:index.php?page=products&action=list');
                    exit;
                }

            }
            break;

        case 'edit':
            if(!empty($_POST)){
                if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['quantity']) || empty($_POST['description'])){

                    if(empty($_POST['name'])){
                        $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                    }
                    if(empty($_POST['price'])){
                        $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
                    }
                    if(!empty($_POST['price']) && intval($_POST['price']) < 0){
                        $_SESSION['messages'][] = 'Le prix ne doit pas être inférieure à 0 !';
                    }
                    if(!is_int($_POST['price']) || !is_float($_POST['price'])){
                        $_SESSION['messages'][] = 'Ne touchez pas au code via la console !!!';
                    }
                    if(empty($_POST['quantity'])){
                        $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
                    }
                    if(!is_int($_POST['quantity'])){
                        $_SESSION['messages'][] = 'Ne touchez pas au code via la console !!!';
                    }
                    if(!empty($_POST['quantity']) && intval($_POST['quantity']) < 1){
                        $_SESSION['messages'][] = 'La quantité ne doit pas être inférieure à 1 !';
                    }
                    if(empty($_POST['description'])){
                        $_SESSION['messages'][] = 'Le champ description est obligatoire !';
                    }

                    $_SESSION['old_inputs'] = $_POST;
                    $products = getAllProducts();
                    $categories = getAllCategories();
                    $view = 'views\productForm.php';
                    $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
                    $pageDescription = 'Formulaire d\'ajout d\'un produit';
                    $style = 'productForm';
                }else {
                    $updateProduct = updateProduct($_GET['id'], $_POST);
                    $_SESSION['messages'][] = $updateProduct ? 'Produit mis à jour !' : 'Erreur lors de la mise à jour !';
                    header('Location:index.php?page=products&action=list');
                    exit;
                }
            }
            else{
                if (!isset($_SESSION['old_inputs'] )){
                    $product = getProduct($_GET['id']);
                    if ($product==false){
                        header('Location:index.php?page=products&action=list');
                        exit;
                    }
                    $products = getAllProducts();
                    $categories = getAllCategories();
                    $view = 'views\productForm.php';
                    $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
                    $pageDescription = 'Formulaire d\'ajout d\'un produit';
                    $style = 'productForm';
                }
                else{
                    $products = getAllProducts();
                    $categories = getAllCategories();
                    $view = 'views\productForm.php';
                    $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
                    $pageDescription = 'Formulaire d\'ajout d\'un produit';
                    $style = 'productForm';
                }
            }

            break;

        case 'delete':

            if(isset($_GET['id'])){
                $result = deleteProduct($_GET['id']);
            }
            else{
                header('Location:index.php?page=products&action=list');
                exit;
            }

            $_SESSION['messages'][] = $result ? 'Produit supprimé !' : 'Erreur lors de la suppression !';

            header('Location:index.php?page=products&action=list');
            exit;

        default:
            require 'controllers/indexController.php';
    }
}
else{
    require 'controllers/indexController.php';
}