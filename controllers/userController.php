<?php

if (!isset($_SESSION['user'])  || $_SESSION['user']['is_admin'] == 0){$view = 'views/index.php';
    $pageTitle = 'Let\'s Duel !';
    $pageDescription = 'Accueil du site';
    $style = 'index';
}

if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']) {
        //Si on demande de lister les produits
        case 'list':
            $view = 'views/user.php';
            $pageTitle = 'Let\'s Duel ! | Profile';
            $pageDescription = 'Profile de l\'utilisateur';
            $style = 'user';
            break;
    }
}