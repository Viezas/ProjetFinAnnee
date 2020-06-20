<?php
function getProductMainImages($productId){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM product_images WHERE main_image = true AND product_id = ?");
    $query->execute([
        $productId
    ]);

    return $query->fetchAll();
}

function getProductSecondaryImages($productId){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM product_images WHERE main_image = 0 AND product_id = ?");
    $query->execute([
        $productId
    ]);

    return $query->fetchAll();
}

function getImage($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM product_images WHERE id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}

function insertImage(){
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO product_images (product_id,main_image, is_activated) VALUES(:product_id,:main_image, :is_activated)");
    $result = $query->execute([
        'product_id' => htmlspecialchars($_SESSION['productId']),
        'main_image' => htmlspecialchars($_POST['is_main']),
        'is_activated' => htmlspecialchars($_POST['is_activated']),
    ]);

    if($result && !empty($_FILES['image']['tmp_name'])){
        $imageId = $db->lastInsertId();

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $_SESSION['productId'] .'-'.$imageId. '.' . $my_file_extension ;
            $destination = '../assets/img/product/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE product_images SET name = '$new_file_name' WHERE id = $imageId");
        }
    }


    return $result;
}

function delete($id)
{
    $db = dbConnect();
    $image = getImage($id);
    if(!empty($image['name'])){
        $unlink = unlink("../assets/img/product/". $image['name']);
    }


    $query = $db->prepare('DELETE FROM product_images WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;

}

function updateImage($id, $informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE product_images SET main_image = ?, is_activated = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['is_main'],
            $informations['is_activated'],
            $id,
        ]
    );

    if($result && !empty($_FILES['image']['tmp_name'])){
        $image = getImage($id);
        if(!empty($image['name'])){
            $unlink = unlink("../assets/img/product/". $image['name']);
        }

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $_SESSION['productId'] .'-'.$id. '.' . $my_file_extension ;
            $destination = '../assets/img/product/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE product_images SET name = '$new_file_name' WHERE id = $id");
        }
    }

    return $result;
}

function issetMainImage(){
    $db = dbConnect();

    $query = $db->prepare('SELECT main_image = 1 FROM product_images WHERE product_id = ?');
    $query->execute([
        $_SESSION['productId'],
    ]);
    $mainImageExist = $query->fetch();
    return $mainImageExist;
}