<?php
function getAllScelledProducts(){
    $db = dbConnect();

    $query = $db->query("
        SELECT p.* 
        FROM products p 
        JOIN product_categories pc ON p.id= pc.product_id
        WHERE pc.category_id IN (1, 2, 3, 4)");
    $products =  $query->fetchAll();

    return $products;
}

function ScelledProductImages(){
    $db = dbConnect();

    $query = $db->query("
        SELECT pi.* 
        FROM product_images pi
        JOIN products p ON pi.product_id = p.id
        WHERE pi.is_activated = 1");
    $images =  $query->fetchAll();

    return $images;
}

function getProduct($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}

function productImage($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM product_images WHERE product_id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}