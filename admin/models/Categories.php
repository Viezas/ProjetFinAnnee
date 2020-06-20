<?php

function getAllCategories(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categories ORDER BY name ASC');
    $categories =  $query->fetchAll();

    return $categories;
}

function getCategory($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM categories WHERE id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}

function add($informations){
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO categories (name, description) VALUES( :name, :description)");
    $result = $query->execute([
        'name' => htmlspecialchars($informations['name']),
        'description' => htmlspecialchars($informations['description']),
    ]);

    if($result && !empty($_FILES['image']['tmp_name'])){
        $categoryId = $db->lastInsertId();

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $categoryId . '.' . $my_file_extension ;
            $destination = 'assets/img/category/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE categories SET image = '$new_file_name' WHERE id = $categoryId");
        }
    }

    return $result;
}

function delete($id)
{
    $db = dbConnect();
    $category = getCategory($id);
    if(!empty($category['image'])){
        $unlink = unlink("assets/img/category/". $category['image']);
    }


    $query = $db->prepare('DELETE FROM categories WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;

}

function updateCategory($id, $informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE categories SET name = ?, description = ? WHERE id = ?');

    $result = $query->execute(
        [
            htmlspecialchars($informations['name']),
            htmlspecialchars($informations['description']),
            $id,
        ]
    );

    if($result && !empty($_FILES['image']['tmp_name'])){
        $category = getCategory($id);
        if(!empty($category['image'])){
            $unlink = unlink("assets/img/category/". $category['image']);
        }

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $id . '.' . $my_file_extension ;
            $destination = 'assets/img/category/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE categories SET image = '$new_file_name' WHERE id = $id");
        }
    }

    return $result;
}