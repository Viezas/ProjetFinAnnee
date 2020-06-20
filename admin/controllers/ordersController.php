<?php
require 'models/Orders.php';

if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        case 'details':
            $orders = getDetails($_GET['order_id']);
            $view = 'views/orderDetails.php';
            $pageTitle = 'Let\'s Duel ! | Detail Commande';
            $pageDescription = 'Page des details d\'une commande pasé';
            $style = 'list';

            break;

        case 'list':
            $orders = getAllOrders();
            $view = 'views/orderList.php';
            $pageTitle = 'Let\'s Duel ! | Commandes';
            $pageDescription = 'Page des commandes pasé';
            $style = 'list';
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