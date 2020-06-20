<?php

require 'models/Accessories.php';

//Vérification qu'une action a été demandé
if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'list':
            $accessories = getAllAccessories();
            $accessoriesImages = accessoriesImages();
            $i=0;
            $view = 'views/accessoires.php';
            $pageTitle = 'Let\'s Duel ! | Accessoires';
            $pageDescription = 'Affiche tout les accessoires';
            $style = 'categories';
            break;

        case 'productPage':
            $product = getProduct($_GET['id']);
            if ($product){
                $productImage = productImage($_GET['id']);
                $view = 'views/productPage.php';
                $pageTitle = 'Let\'s Duel ! | Produits';
                $pageDescription = 'Affiche les informations du produits';
                $style = 'productPage';
            }
            else{
                header('location:index.php?page=accessoires&action=list');
                exit();
            }

            break;

        default :
            header('Location:index.php');
            exit();
    }
}
else{
    header('Location:index.php');
    exit();
}