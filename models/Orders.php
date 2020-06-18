<?php
function insertOrder($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO orders (user_id, last_name, first_name, delivery_adress) VALUES( :user_id, :last_name, :first_name, :delivery_adress)");
    $result = $query->execute([
        'user_id' => $informations['id'],
        'last_name' => htmlspecialchars($informations['last_name']),
        'first_name' => htmlspecialchars($informations['first_name']),
        'delivery_adress' => htmlspecialchars($informations['adress']),
    ]);

    return $result;
}

function getAllProducts(){
    $db = dbConnect();

    $query = $db->query("SELECT * FROM products");

    return $query->fetchAll();
}

function insertOrderInformations()
{
    $db = dbConnect();
    $orders = getAllOrders();
    $arrayLastTable = end($orders);
    $orderId = $arrayLastTable['id'];
    $products = getAllProducts();


    foreach ($_SESSION['cart'] as $product_id => $quantity){
        foreach ($products as $product){
            if ($product_id == $product['id']){
                $productName = $product['name'];
                $price = $product['price'];
            }
        }

        $query = $db->prepare("INSERT INTO order_details (order_id, name, price, quantity) VALUES( :order_id, :name, :price, :quantity)");
        $result = $query->execute([
            'order_id' => $orderId,
            'name' => $productName,
            'price' => $price,
            'quantity' => $quantity,
        ]);
    }

    return $result;
}

function getAllOrders()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders WHERE user_id = '.$_SESSION['user']['id']);
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