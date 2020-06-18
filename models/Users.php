<?php
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
        $query = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, email = ?, adress = ? WHERE id = ?');
        $result = $query->execute(
            [
                htmlspecialchars($informations['first_name']),
                htmlspecialchars($informations['last_name']),
                htmlspecialchars($informations['email']),
                htmlspecialchars($informations['adress']),
                $id,
            ]
        );
    }
    else{
        $query = $db->prepare('UPDATE users SET first_name = ?, last_name = ?, email = ?, adress = ?, password = ? WHERE id = ?');
        $result = $query->execute(
            [
                htmlspecialchars($informations['first_name']),
                htmlspecialchars($informations['last_name']),
                htmlspecialchars($informations['email']),
                htmlspecialchars($informations['adress']),
                htmlspecialchars(hash('md5', $informations['password'])),
                $id,
            ]
        );
    }

    return $result;
}