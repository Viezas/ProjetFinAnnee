<?php


//Vérification qu'une action a été demandé
if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'list':
            $view = 'views/carteALunite.php';
            $pageTitle = 'Let\'s Duel ! | Carte à l\'unité';
            $pageDescription = 'Affiche toute les cartes à l\'unité';
            $style = 'categories';
            break;

        case 'filter':

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