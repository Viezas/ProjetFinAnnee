<?php

require 'models/Product.php';
require 'models/ScelledProducts.php';


if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'displayCart':
            $cartProducts = [];
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                $cartProducts = getProductForCart();
            }
            $images = productImages();
            $view = 'views/cartPage.php';
            $pageTitle = 'Let\'s Duel !';
            $pageDescription = 'Panier';
            $style = 'cartPage';

            break;

        case 'addProduct':
            $product = getProduct($_GET['product_id']);
            if (ctype_digit($_POST['quantity']) && ctype_digit($_POST['quantity']) <= $product['stock']){
                $productExist = verifyProduct($_GET['product_id']);
                if ($productExist == false){
                    $view = 'views/index.php';
                    $pageTitle = 'Let\'s Duel !';
                    $pageDescription = 'Accueil du site';
                    $style = 'index';
                }
                $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity'];
                $cartProducts = getProductForCart();
                $images = productImages();
                $view = 'views/cartPage.php';
                $pageTitle = 'Let\'s Duel !';
                $pageDescription = 'Panier';
                $style = 'cartPage';
            }
            else{
                $view = 'views/index.php';
                $pageTitle = 'Let\'s Duel !';
                $pageDescription = 'Accueil du site';
                $style = 'index';
            }

            break;

        case 'update_quantity':
            $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity'];
            $cartProducts = getProductForCart();
            $images = productImages();
            $view = 'views/cartPage.php';
            $pageTitle = 'Let\'s Duel !';
            $pageDescription = 'Panier';
            $style = 'cartPage';
            break;

        case 'deleteProduct':
            unset($_SESSION['cart'][$_GET['product_id']]);
            $cartProducts = getProductForCart();
            $images = productImages();
            $view = 'views/cartPage.php';
            $pageTitle = 'Let\'s Duel !';
            $pageDescription = 'Panier';
            $style = 'cartPage';
            break;
    }
}