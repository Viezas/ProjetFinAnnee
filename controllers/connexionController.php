<?php

require ('models/Connexion.php');

//Vérification qu'une action a été demandé
if (isset($_GET['action'])){
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']){
        //Si on demande de lister les produits
        case 'form':
            $view = 'views/connexion.php';
            $pageTitle = 'Let\'s Duel ! | Connexion';
            $pageDescription = 'Formulaire de connexion';
            $style = 'connexion';
            break;

        case 'connexion':

            if (!empty($_POST)) {
                if (empty($_POST['email']) || empty($_POST['password'])) {
                    $_SESSION['messages'][] = 'Tout les champs sont obligatoires !';
                    $view = 'views/connexion.php';
                }
                else{
                    $connexion = connexion();
                    if ($connexion){
                        $user = getUser($_POST);
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'first_name' => $user['first_name'],
                            'last_name' => $user['last_name'],
                            'adress' => $user['adress'],
                            'email' => $user['email'],
                            'password' => $user['password'],
                            'is_admin' => $user['is_admin']
                        ];
                        header('location: index.php?page=user&action=list');
                        exit();
                    }
                    else{
                        $_SESSION['messages'][] = 'Erreur lors de la connexion';
                        $view = 'views/connexion.php';
                    }
                }
            }
            $pageTitle = 'Let\'s Duel ! | Connexion';
            $pageDescription = 'Formulaire de connexion';
            $style = 'connexion';
            break;

        case 'disconnect':
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            header('Location:index.php');
            exit();
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