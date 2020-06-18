<?php

function getAllOrders()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders');
    $orders =  $query->fetchAll();


    return $orders;
}

function getDetails($order_id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM order_details WHERE order_id = ?');
    $result = $query->execute([
        $order_id
    ]);
    $details = $query->fetchAll();

    return $details;
}