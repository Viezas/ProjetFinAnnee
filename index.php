<?php
//Rooter du site

//Début d'une session afin de crée son panier
session_start();

//Appel de la db
require ('helpers.php');

//Création du panier si il n'est pas déjà crée
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

//Switch pour savoir vers quel controller on redirige l'utilisateur
if(isset($_GET['page'])){
    //Si on demande quelque chose via l'url, on vérifie quelle est la demande
    switch ($_GET['page']){
        //Si on demande en url d'afficher la page d'accueil, on redirige vers le controller : indexController.php
        case'index' :
            require 'controllers/indexController.php';
            break;

        //Si on demande en url d'afficher les produits scellés, on redirige vers le controller : produitsScellesController.php
        case'produitsScelles' :
            require 'controllers/produitsScellesController.php';
            break;

        //Si on demande en url d'afficher les cartes à l'unité, on redirige vers le controller : carteALuniteController.php
        case'carteALunite' :
            require 'controllers/carteALuniteController.php';
            break;

        //Si on demande en url d'afficher les produits dérivés, on redirige vers le controller : produitsDerivesController.php
        case'produitsDerives' :
            require 'controllers/produitsDerivesController.php';
            break;

        //Si on demande en url d'afficher les accessoires, on redirige vers le controller : accessoiresController.php
        case'accessoires' :
            require 'controllers/accessoiresController.php';
            break;

        //Si on demande en url la page de connexion, on redirige vers le controller : connexionController.php
        case'connexion' :
            require 'controllers/connexionController.php';
            break;

        //Si on demande en url la page d'inscription', on redirige vers le controller : inscriptionController.php
        case'inscription' :
            require 'controllers/inscriptionController.php';
            break;

        //Si on demande en url la page profile, on redirige vers le controller : userController.php
        case'user' :
            require 'controllers/userController.php';
            break;

        //Si on demande en url la page d'inscription', on redirige vers le controller : adminController.php
        case'admin' :
            require 'controllers/adminController.php';
            break;

        //Si la demande ne correspond à aucun des cas figuré au dessus, on redirige vers la page d'accueil
        default :
            require 'controllers/indexController.php';
    }
}
//Si on demande rien, on affiche par défaut la page d'accueil
else{
    require 'controllers/indexController.php';
}

//Après le switch, on récupère les informations ciblé dans le controller et on s'en sert dans le layout
require ('views/layout.php');

if(isset($_SESSION['messages'])){
    unset($_SESSION['messages']);
}
if(isset($_SESSION['old_inputs'])){
    unset($_SESSION['old_inputs']);
}