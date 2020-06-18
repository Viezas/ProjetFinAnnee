<?php

if (!isset($_SESSION['user'])){
    header('Location:index.php?page=connexion&action=form');
    exit;
}

require 'models/Orders.php';

if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'new':
            $insertOrder = insertOrder($_SESSION['user']);
            if ($insertOrder){
                $insertOrderInformations = insertOrderInformations();
                if ($insertOrderInformations){
                    unset($_SESSION['cart']);
                }
                $_SESSION['messages'][] = 'Commande généré avec succès !';
                $view = 'views/orderList.php';
                $pageTitle = 'Let\'s Duel ! | Commandes';
                $pageDescription = 'Page des commandes pasé';
                $style = 'ordersList';
            }
            else{
                $_SESSION['messages'][] = 'Une erreur c\'est produite lors de la génération de la commande !';
                $view = 'views/cartPage.php';
                $pageTitle = 'Let\'s Duel !';
                $pageDescription = 'Panier';
                $style = 'cartPage';
            }

            break;

        case 'details':
            $orders = getDetails($_GET['order_id']);
            $view = 'views/orderDetails.php';
            $pageTitle = 'Let\'s Duel ! | Detail Commande';
            $pageDescription = 'Page des details d\'une commande pasé';
            $style = 'orderDetails';

            break;

        case 'list':
            $orders = getAllOrders();
            $view = 'views/orderList.php';
            $pageTitle = 'Let\'s Duel ! | Commandes';
            $pageDescription = 'Page des commandes pasé';
            $style = 'ordersList';
            break;
    }
}