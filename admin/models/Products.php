<?php
function getAllProducts(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products ');
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

    $query = $db->prepare("INSERT INTO products (name, price, quantity, description) VALUES( :name, :price, :quantity, :description)");
    $result = $query->execute([
        'name' => $informations['name'],
        'price' => $informations['price'],
        'quantity' => $informations['quantity'],
        htmlspecialchars($informations['description']),
    ]);

    if($result && !empty($_FILES['image']['tmp_name'])){
        $productId = $db->lastInsertId();

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $productId . '.' . $my_file_extension ;
            $destination = '../assets/img/product/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE products SET image = '$new_file_name' WHERE id = $productId");
        }
    }
    else{
        return false;
    }

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

    $query = $db->prepare('UPDATE products SET name = ?, price = ? , quantity = ?, description = ? WHERE id = ?');

    $result = $query->execute(
        [
            $informations['name'],
            $informations['price'],
            $informations['quantity'],
            htmlspecialchars($informations['description']),
            $id,
        ]
    );
    
    $query = $db->prepare("DELETE FROM product_categories WHERE product_id=?");
    $result= $query->execute(
        [
            $id,
        ]
    );

    if($result && !empty($_FILES['image']['tmp_name'])){
        $product = getProduct($id);
        if(!empty($product['image'])){
            $unlink = unlink("../assets/img/product/". $product['image']);
        }

        $allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
        $my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
        if (in_array($my_file_extension , $allowed_extensions)){
            $new_file_name = $id . '.' . $my_file_extension ;
            $destination = '../assets/img/product/' . $new_file_name;
            $result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

            $db->query("UPDATE products SET image = '$new_file_name' WHERE id = $id");
        }
    }
    else{
        return false;
    }

    if(isset($informations['category_id'])){
        insertProductCategoriesLinks($id, $informations['category_id']);
    }
    //vérifier si nouveau fichier à été envoyé, et écraser l'ancien si c'est le cas

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
