<?php
require 'models/Products.php';
require 'models/Categories.php';

if (isset($_SESSION['productId'])){
    unset($_SESSION['productId']);
}

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
            $style = 'form';
            break;

        case 'add':
            if (!empty($_POST)){
                if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['stock']) || empty($_POST['description'])){

                    if(empty($_POST['name'])){
                        $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                    }
                    if(empty($_POST['price'])){
                        $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
                    }
                    if(empty($_POST['stock'])){
                        $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
                    }
                    if(empty($_POST['description'])){
                        $_SESSION['messages'][] = 'Le champ description est obligatoire !';
                    }

                    $_SESSION['old_inputs'] = $_POST;
                    header('Location:index.php?page=products&action=new');
                    exit;
                }
                else{
                    if(ctype_digit($_POST['price'])&& ctype_digit($_POST['stock']) ){
                        if (!isset($_POST['is_activated'])){
                            $_POST['is_activated'] = 0;
                        }
                        else{
                            $_POST['is_activated'] = 1;
                        }
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
                    }else{
                        $_SESSION['messages'][] = 'Le prix ne doit pas être inférieur à 0 et la quantité doit être égale à 1 au minimum !';
                        $_SESSION['old_inputs'] = $_POST;
                        header('Location:index.php?page=products&action=new');
                        exit;
                    }
                }
            }
            header('Location:index.php?page=products&action=list');
            exit;

            break;

        case 'edit':
            $_SESSION['product_id'] = $_GET['id'];
            if (ctype_digit($_SESSION['product_id'])){
                $product = getProduct($_SESSION['product_id']);
                if ($product==false){
                    header('Location:index.php?page=products&action=list');
                    exit;
                }
                if(!empty($_POST)){
                    if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['stock']) || empty($_POST['description'])){

                        if(empty($_POST['name'])){
                            $_SESSION['messages'][] = 'Le champ nom est obligatoire !';
                        }
                        if(empty($_POST['price'])){
                            $_SESSION['messages'][] = 'Le champ prix est obligatoire !';
                        }
                        if(empty($_POST['stock'])){
                            $_SESSION['messages'][] = 'Le champ quantité est obligatoire !';
                        }
                        if(empty($_POST['description'])){
                            $_SESSION['messages'][] = 'Le champ description est obligatoire !';
                        }

                        $_SESSION['old_inputs'] = $_POST;
                        header('Location:index.php?page=products&action=new');
                        exit;
                    }
                    else {
                        if((ctype_digit($_POST['price']) && ctype_digit($_POST['price']) < 0) && ( ctype_digit($_POST['stock']) && ctype_digit($_POST['stock']) < 1) ){
                            if (!isset($_POST['is_activated'])){
                                $_POST['is_activated'] = 0;
                            }
                            else{
                                $_POST['is_activated'] = 1;
                            }
                            $updateProduct = updateProduct($_SESSION['product_id'], $_POST);
                            $_SESSION['messages'][] = $updateProduct ? 'Produit mis à jour !' : 'Erreur lors de la mise à jour !';
                            header('Location:index.php?page=products&action=list');
                            exit;
                        }
                    }
                }
                else{
                    if (!isset($_SESSION['old_inputs'] )){
                        $product = getProduct($_SESSION['product_id']);
                        if ($product==false){
                            header('Location:index.php?page=products&action=list');
                            exit;
                        }
                        $categories = getAllCategories();
                        $view = 'views\productForm.php';
                        $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
                        $pageDescription = 'Formulaire d\'ajout d\'un produit';
                        $style = 'form';
                    }
                    else{
                        $categories = getAllCategories();
                        $view = 'views\productForm.php';
                        $pageTitle = 'Let\'s Duel ! | Ajout d\'un produit';
                        $pageDescription = 'Formulaire d\'ajout d\'un produit';
                        $style = 'form';
                    }
                }
            }
            break;

        case 'delete':
            $_SESSION['product_id'] = $_GET['id'];
            if (ctype_digit($_SESSION['product_id'])){
                $product = getProduct($_SESSION['product_id']);
                if ($product==false){
                    header('Location:index.php?page=products&action=list');
                    exit;
                }
                if(isset($_SESSION['product_id'])){
                    $result = deleteProduct($_SESSION['product_id']);
                }
                else{
                    header('Location:index.php?page=products&action=list');
                    exit;
                }

                $_SESSION['messages'][] = $result ? 'Produit supprimé !' : 'Erreur lors de la suppression !';

                header('Location:index.php?page=products&action=list');
                exit;
            }


        default:
            header('Location:index.php');
            exit();
    }
}
else{
    header('Location:index.php');
    exit();
}