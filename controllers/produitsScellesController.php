<?php

require 'models/ScelledProducts.php';

//Vérification qu'une action a été demandé
if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'list':
            $scelledProducts = getAllScelledProducts();
            $ScelledProductImages = ScelledProductImages();
            $i=0;
            $view = 'views/produitsScelles.php';
            $pageTitle = 'Let\'s Duel ! | Produits Scellés';
            $pageDescription = 'Affiche tout les produits scellés';
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
                $scelledProducts = getAllScelledProducts();
                $ScelledProductImages = ScelledProductImages();
                $i=0;
                $view = 'views/produitsScelles.php';
                $pageTitle = 'Let\'s Duel ! | Produits Scellés';
                $pageDescription = 'Affiche tout les produits scellés';
                $style = 'categories';
            }

            break;

        default :
            header('Location:index.php');
            exit();
    }
}
else{
    $view = 'views/index.php';
    $pageTitle = 'Let\'s Duel !';
    $pageDescription = 'Accueil du site';
    $style = 'index';
}