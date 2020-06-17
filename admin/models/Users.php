<?php

function getAllUsers(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users ORDER BY is_admin DESC ');
    $users =  $query->fetchAll();

    return $users;
}

function emailExist(){
    $db = dbConnect();

    $query = $db->prepare('SELECT email FROM users WHERE email = ?');
    $query->execute([
        $_POST['email']
    ]);
    $emailExist = $query->fetch();
    return $emailExist;
}

function addUser($is_admin){
    $db = dbConnect();

    $query = $db->prepare('INSERT INTO users (first_name, last_name, adress, email, password, is_admin) VALUES (?, ?, ?, ?, ?, ?)');
    $result = $query->execute(
        [
            $_POST['first_name'],
            $_POST['last_name'],
            $_POST['adress'],
            $_POST['email'],
            hash('md5', $_POST['password']),
            $is_admin,
        ]
    );

    return $result;
}

function deleteUser($id){
    $db = dbConnect();
    $query = $db->prepare('DELETE FROM users WHERE id = ?');
    $result = $query->execute(
        [
            $id
        ]
    );

    return $result;
}

function getUser($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([
        $id
    ]);

    $result = $query->fetch();

    return $result;
}

function updateUser($id, $informations){
    $db = dbConnect();

    if (empty($informations['password'])){
        $query = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, email = ?, adress = ?, is_admin = ? WHERE id = ?');
        $result = $query->execute(
            [
                htmlspecialchars($informations['first_name']),
                htmlspecialchars($informations['last_name']),
                htmlspecialchars($informations['email']),
                htmlspecialchars($informations['adress']),
                htmlspecialchars($informations['is_admin']),
                $id,
            ]
        );
    }
    else{
        $query = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, email = ?, adress = ?, password = ? , is_admin = ? WHERE id = ?');
        $result = $query->execute(
            [
                htmlspecialchars($informations['first_name']),
                htmlspecialchars($informations['last_name']),
                htmlspecialchars($informations['email']),
                htmlspecialchars($informations['adress']),
                htmlspecialchars(hash('md5', $informations['password'])),
                htmlspecialchars($informations['is_admin']),
                $id,
            ]
        );
    }

    return $result;
}