<?php
function connexion(){
    $db = dbConnect();
    $query = $db->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
    $query->execute([
        $_POST['email'],
        md5($_POST['password']),
    ]);
    $user = $query->fetchAll();
    return $user;
}

function getUser($informations){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([
        $informations['email']
    ]);

    $result = $query->fetch();

    return $result;
}