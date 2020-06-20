<?php
require 'models/Users.php';

if (isset($_GET['action'])){
    switch ($_GET['action']){
        case 'list':
            $users = getAllUsers();
            $view = 'views/usersList.php';
            $pageTitle = 'Let\'s Duel ! | Utilisateurs';
            $pageDescription = 'Liste tout les utilisateurs';
            $style = 'list';
            break;

        case 'new':
            $view = 'views/userForm.php';
            $pageTitle = 'Let\'s Duel ! | Ajouter un Utilisateur';
            $pageDescription = 'formulaire d\'ajouter d\'un utilisateur';
            $style = 'form';
            break;

        case 'add':
            if (!empty($_POST)){
                if (empty($_POST['last_name']) || empty($_POST['first_name']) || empty($_POST['adress']) || empty($_POST['email']) || empty($_POST['password'])){
                    $_SESSION['messages'][] = 'Tout les champs sont obligatoires !';
                    header('location: index.php?page=users&action=new');
                    exit();
                }
                elseif (!ctype_digit($_POST['is_admin']) && (intval($_POST['is_admin']) !== 0 || intval($_POST['is_admin']) !==1)){
                    $_SESSION['messages'][] = 'Ne touchez pas au code via la console s\'il-vous-plaît !!!';
                    header('location: index.php?page=users&action=new');
                    exit();
                }
                else {
                    $emailExist = emailExist();
                    if (!$emailExist) {
                        $is_admin = intval($_POST['is_admin']);
                        $addUser = addUser($is_admin);
                        if ($addUser) {
                            $_SESSION['messages'][] = 'Nouvel utilisateur enregistrer avec succès !';
                            header('location: index.php?page=users&action=list');
                            exit();
                        } else {
                            $_SESSION['messages'][] = 'Problème lors de l\'insertion !';
                            header('location: index.php?page=users&action=new');
                            exit();
                        }

                    } else {
                        $_SESSION['messages'][] = 'Email déjà utilisé !';
                        header('location: index.php?page=users&action=new');
                        exit();
                    }
                }
            }
            break;

        case 'edit' :
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
                    $_SESSION['old_inputs'] = $_POST;
                    $view = 'views/userForm.php';
                    $pageTitle = 'Let\'s Duel ! | Modifier un Utilisateur';
                    $pageDescription = 'formulaire de modification d\'un utilisateur';
                    $style = 'form';
                }
                elseif (!ctype_digit($_POST['is_admin']) && (ctype_digit($_POST['is_admin']) !== 0 || ctype_digit($_POST['is_admin']) !==1)){
                    $_SESSION['messages'][] = 'Ne touchez pas au code via la console s\'il-vous-plaît !!!';
                    $_SESSION['old_inputs'] = $_POST;
                    header('location: index.php?page=users&action=new');
                    exit();
                }
                else {
                    $updateUser = updateUser($_GET['id'], $_POST);
                    $_SESSION['messages'][] = $updateUser ? 'Utilisateur mis à jour !' : 'Erreur lors de la mise à jour !';
                    header('Location:index.php?page=users&action=list');
                    exit;
                }
            }
            else{
                if (!isset($_SESSION['old_inputs'] )){
                    $user = getUser($_GET['id']);
                    if ($user==false){
                        header('Location:index.php?page=users&action=list');
                        exit;
                    }
                    $view = 'views/userForm.php';
                    $pageTitle = 'Let\'s Duel ! | Ajouter un Utilisateur';
                    $pageDescription = 'formulaire d\'ajouter d\'un utilisateur';
                    $style = 'form';
                }
                $view = 'views/userForm.php';
                $pageTitle = 'Let\'s Duel ! | Ajouter un Utilisateur';
                $pageDescription = 'formulaire d\'ajouter d\'un utilisateur';
                $style = 'form';
            }
            break;

        case 'delete' :
            if (isset($_GET['id'])){
                $result = deleteUser($_GET['id']);
                if($result){
                    $_SESSION['messages'][] = 'Utilisateur supprimé !';
                }
            }
            else{
                $_SESSION['messages'][] = 'Erreur lors de la suppression !';
            }
            header('location: index.php?page=users&action=list');
            exit;
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