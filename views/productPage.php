<div class="productPageContainer">
    <div class="productCase">
        <img src="assets/img/product/<?=$productImage['name'];?>" class="product" alt="<?=$product['name'];?>">
    </div>
    <div class="informations">
        <p class="productName"><?=$product['name'];?></p>
        <hr>
        <p><span class="productPrice"><?=$product['price'];?>€</span>(TTC)</p>
        <hr>
        <form action="index.php?page=cart&action=addProduct&product_id=<?=$product['id'];?>" method="post">
            <h3>Quantité disponible : <?=$product['stock'];?></h3>
            <input type="number" name="quantity" min="0" max="<?=$product['stock'];?>"><br>
            <input type="submit" value="Ajouter au panier">
            <input type="submit" value="Acheter maintenant">
        </form>
        <hr>
        <div class="description">
            <p><?=$product['description'];?></p>
        </div>
    </div>
</div>
