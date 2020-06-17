<?php

function emailExist(){
    $db = dbConnect();

    $query = $db->prepare('SELECT email FROM users WHERE email = ?');
    $query->execute([
        $_POST['email']
    ]);
    $emailExist = $query->fetch();
    return $emailExist;
}

function register(){
    $db = dbConnect();

    $query = $db->prepare('INSERT INTO users (first_name, last_name, adress, email, password) VALUES (?, ?, ?, ?, ?)');
    $result = $query->execute(
        [
            htmlspecialchars($_POST['first_name']),
            htmlspecialchars($_POST['last_name']),
            htmlspecialchars($_POST['adress']),
            htmlspecialchars($_POST['email']),
            htmlspecialchars(hash('md5', $_POST['password'])),
        ]
    );

    return $result;
}