<?php


//Vérification qu'une action a été demandé
if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'list':
            $view = 'views/produitsDerives.php';
            $pageTitle = 'Let\'s Duel ! | Produits Dérivés';
            $pageDescription = 'Affiche les produits dérivés';
            $style = 'categories';
            break;

        case 'filter':

    }
}