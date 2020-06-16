<?php

require ('models/Register.php');
require ('models/Connexion.php');

//Vérification qu'une action a été demandé
if (isset($_GET['action'])) {
    //Switch afin de savoir ce que l'on fait en fonction du action demandé
    switch ($_GET['action']) {
        case 'form':
            $view = 'views/inscription.php';
            $pageTitle = 'Let\'s Duel ! | Inscription';
            $pageDescription = 'Formulaire d\'inscription';
            $style = 'connexion';
            break;
        case 'register':
            if (!empty($_POST)){
                if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['adress']) || empty($_POST['email']) || empty($_POST['password'])){
                    $_SESSION['messages'][] = 'Tout les champs sont obligatoires !';
                }
                else{
                    $emailExist = emailExist();
                    if (!$emailExist){
                        $register = register();
                        if ($register){
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
                            $_SESSION['messages'][] = 'Problème lors de l\'insertion !';
                            $view = 'views/inscription.php';
                        }
                    }
                    else{
                        $_SESSION['messages'][] = 'Email déjà utilisé !';
                        $view = 'views/inscription.php';
                    }
                }
            }
            $pageTitle = 'Let\'s Duel ! | Inscription';
            $pageDescription = 'Formulaire d\'inscription';
            $style = 'connexion';
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

