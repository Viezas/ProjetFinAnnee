<?php
function getAllProducts(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products');
    $products =  $query->fetchAll();

    return $products;
}

function getProduct($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT * FROM products WHERE id = ?");
    $query->execute([
        $id
    ]);

    return $query->fetch();
}

function getLastInsertedProductId(){
    $products = getAllProducts();

    $arrayLastTable = end($products);

    $productId = $arrayLastTable['id'];

    return $productId;
}

function getProductsCategories(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM product_categories ');
    $product_categories =  $query->fetchAll();

    return $product_categories;
}

function addProduct($informations)
{
    $db = dbConnect();

    $query = $db->prepare("INSERT INTO products (name, price, stock, description, is_activated) VALUES( :name, :price, :stock, :description, :is_activated)");
    $result = $query->execute([
        'name' => htmlspecialchars($informations['name']),
        'price' => htmlspecialchars($informations['price']),
        'stock' => htmlspecialchars($informations['stock']),
        'description' => htmlspecialchars($informations['description']),
        'is_activated' => $informations['is_activated'],
    ]);

    return $result;
}

function insertProductCategoriesLinks($productId,$categoryIds){
    $db = dbConnect();

    $queryString ="INSERT INTO product_categories (product_id, category_id) VALUES ";
    $queryValues=array();

    foreach($categoryIds as $key=>$categoryId){
        //génération dynamique de $queryString ;::
        $queryString .= "(:product_id_$key, :category_id_$key)";
        if ($key != array_key_last($categoryIds)) {
            $queryString .= ',';
        }
        else {
            $queryString .= ';';
        }

        //génération dynamique de $queryValues
        //à chaque boucle , on ajoute au tableau les valeurs correspondantes à (?,?)
        $queryValues["product_id_$key"] =$productId;
        $queryValues["category_id_$key"] = $categoryId;
    }

    $query=$db->prepare($queryString);
    $query->execute($queryValues);


}

function updateProduct($id, $informations){
    $db = dbConnect();

    $query = $db->prepare('UPDATE products SET name = ?, price = ? , stock = ?, description = ?, is_activated = ? WHERE id = ?');

    $result = $query->execute(
        [
            htmlspecialchars($informations['name']),
            htmlspecialchars($informations['price']),
            htmlspecialchars($informations['stock']),
            htmlspecialchars($informations['description']),
            $informations['is_activated'],
            $id,
        ]
    );
    
    $query = $db->prepare("DELETE FROM product_categories WHERE product_id=?");
    $result= $query->execute(
        [
            $id,
        ]
    );

    if(isset($informations['category_id'])){
        insertProductCategoriesLinks($id, $informations['category_id']);
    }

    return $result;
}

function deleteProduct($id)
{
$db = dbConnect();
    $product = getProduct($id);
    if(!empty($product['image'])){
        $unlink = unlink("../assets/img/product/". $product['image']);
    }


    $query = $db->prepare('DELETE FROM products WHERE id = ?');
    $result = $query->execute([$id]);

    return $result;

}
