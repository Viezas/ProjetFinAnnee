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
                    header('Location:index.php?page=connexion&action=form');
                    exit();
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
                        header('Location:index.php?page=connexion&action=form');
                        exit();
                    }
                }
            }
            header('Location:index.php?page=connexion&action=form');
            exit();
            break;

        case 'disconnect':
            session_destroy();
            header('Location:index.php');
            exit();
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