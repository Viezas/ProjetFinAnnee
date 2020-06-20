<?php

require 'models/card.php';

//Vérification qu'une action a été demandé
if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'list':
            $cards = getAllCards();
            $cardImages = cardImages();
            $i=0;
            $view = 'views/carteALunite.php';
            $pageTitle = 'Let\'s Duel ! | Carte à L\'unité';
            $pageDescription = 'Affiche toutes les cartes';
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
                header('location:index.php?page=carteALunite&action=list');
                exit();
            }

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