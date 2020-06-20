<?php

if (!isset($_SESSION['user'])){
    header('Location:index.php');
    exit();
}

require 'models/Users.php';

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

        case 'modifyInfos':
            if(!empty($_POST)){
                if(empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['adress'])){

                    if(($_POST['first_name']) || empty($_POST['last_name'])){
                        $_SESSION['messages'][] = 'Les champ nom et prénom sont obligatoire !';
                    }
                    if(empty($_POST['email'])){
                        $_SESSION['messages'][] = 'Le champ email est obligatoire !';
                    }
                    if(empty($_POST['adress'])){
                        $_SESSION['messages'][] = 'Le champ adress est obligatoire !';
                    }
                    header('Location:index.php?page=connexion&action=form');
                    exit();
                }
                else {
                    $updateUser = updateUser($_SESSION['user']['id'], $_POST);
                    $_SESSION['messages'][] = $updateUser ? 'Utilisateur mis à jour !' : 'Erreur lors de la mise à jour !';
                    header('Location:index.php?page=user&action=list');
                    exit;
                }
            }
            else{
                if (!isset($_SESSION['old_inputs'] )){
                    $user = getUser($_SESSION['user']['id']);
                    if ($user==false){
                        header('Location:index.php?page=user&action=list');
                        exit;
                    }
                }
                $view = 'views/userInfos.php';
                $pageTitle = 'Let\'s Duel ! | Info profile';
                $pageDescription = 'Informations de l\'utilisateur';
                $style = 'connexion';
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
