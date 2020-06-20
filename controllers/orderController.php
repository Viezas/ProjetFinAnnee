<?php
if (!isset($_SESSION['user'])){
    header('Location:index.php?page=connexion&action=form');
    exit;
}

require 'models/Orders.php';

if (isset($_GET['action'])){
    switch ($_GET['action']){
        case 'new':
            $insertOrder = insertOrder($_SESSION['user']);
            if ($insertOrder){
                $insertOrderInformations = insertOrderInformations();
                if ($insertOrderInformations){
                    unset($_SESSION['cart']);
                }
                $_SESSION['messages'][] = 'Commande généré avec succès !';
                header('location:index.php?page=order&action=list');
                exit();
            }
            else{
                $_SESSION['messages'][] = 'Une erreur c\'est produite lors de la génération de la commande !';
                $view = 'views/cartPage.php';
                $pageTitle = 'Let\'s Duel !';
                $pageDescription = 'Panier';
                $style = 'cartPage';
            }
            break;

        case 'detail':
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

        default:
            header('Location:index.php');
            exit();
    }
}
else{
    header('Location:index.php');
    exit();
}