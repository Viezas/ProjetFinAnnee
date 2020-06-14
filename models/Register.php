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
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['adress'],
            $_POST['email'],
            hash('md5', $_POST['password']),
        ]
    );

    return $result;
}