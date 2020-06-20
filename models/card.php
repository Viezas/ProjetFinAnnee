<?php


function getAllCards()
{
    $db = dbConnect();

    $query = $db->query("
        SELECT p.* 
        FROM products p 
        JOIN product_categories pc ON p.id= pc.product_id
        WHERE pc.category_id IN (21, 22, 23, 24, 25, 26, 27, 28, 29, 30) ORDER BY id ASC");
    $products = $query->fetchAll();

    return $products;
}

function cardImages()
{
    $db = dbConnect();

    $query = $db->query("
        SELECT pi.* 
        FROM product_images pi
        JOIN products p ON pi.product_id = p.id
        WHERE pi.is_activated = 1");
    $images = $query->fetchAll();

    return $images;
}

function getProduct($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}

function productImage($id)
{
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM product_images WHERE product_id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}