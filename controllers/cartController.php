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
            if (ctype_digit($_POST['quantity']) && ctype_digit($_POST['quantity']) > 0 && ctype_digit($_POST['quantity']) <= $product['stock']){
                $productExist = verifyProduct($_GET['product_id']);
                if ($productExist == false){
                    header('location:index.php');
                    exit();
                }
                $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity'];
                header('location:index.php?page=cart&action=displayCart');
                exit();
            }
            else{
                header('location: index.php');
            }

            break;

        case 'update_quantity':
            $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity'];
            header('location:index.php?page=cart&action=displayCart');
            exit();
            break;

        case 'deleteProduct':
            unset($_SESSION['cart'][$_GET['product_id']]);
            header('location:index.php?page=cart&action=displayCart');
            exit();
            break;

        default:
            header('Location:index.php');
            exit();
    }
}
else{
    header('Location:index.php');
    exit();
}