<?php

function getProductForCart(){
    $db = dbConnect();

    foreach ($_SESSION['cart'] as $product_id => $quantity){
        $query = $db->query('SELECT * FROM products WHERE id= '.$product_id);
        $products[] =  $query->fetch();
    }

    return $products;
}

function verifyProduct($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);
    $exist = $query->fetch();

    return $exist;
}


function productImages(){
    $db = dbConnect();

    $query = $db->query("SELECT * FROM product_images");

    return $query->fetchAll();
}