<div class="cartContainer">
    <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
        <?php foreach ($_SESSION['messages'] as $message): ?>
            <div class="message">
                <h1><?= $message;?></h1>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    <table>
        <thead>
        <tr>
            <td><h2>Produit</h2></td>
            <td><h2>Nom</h2></td>
            <td><h2>Quantité</h2></td>
            <td><h2>Prix</h2></td>
            <td><h2>Supprimer</h2></td>
        </tr>
        </thead>
        <?php $total = 0;?>
        <?php foreach ($cartProducts as $cartProduct): ?>
        <tr>
            <td>
                <?php foreach ($images as $image): ?>
                    <?php if ($cartProduct['id'] == $image['product_id'] && $image['main_image'] == 1): ?>
                        <p><img src="assets/img/product/<?=$image['name']; ?>" class="image" alt="<?=$cartProduct['name']; ?>"></p>
                    <?php endif;?>
                <?php endforeach;?>
            </td>
            <td>
                <p><?=$cartProduct['name']; ?></p>
            </td>
            <td>
                <form action="index.php?page=cart&action=update_quantity&product_id=<?=$cartProduct['id'];?>" method="post">
                    <h4>Quantité disponible : <?=$cartProduct['stock'];?></h4>
                    <input type="number" name="quantity" min="0" max="<?=$cartProduct['stock'];?>" value="<?=$_SESSION['cart'][$cartProduct['id']]; ?>"><br>
                    <input type="submit" value="Modifier la quantité">
                </form>
            </td>
            <td>
                <p>
                    <?= $rowTotal = $cartProduct['price']*$_SESSION['cart'][$cartProduct['id']];?>€<br>
                    (<?=$cartProduct['price']; ?>€ * <?=$_SESSION['cart'][$cartProduct['id']]; ?>)
                    <?php $total += $rowTotal; ?>
                </p>
            </td>
            <td>
                <p>
                    <a href="index.php?page=cart&action=deleteProduct&product_id=<?=$cartProduct['id']; ?>"><img src="assets/img/Buttons/trash.png" class="delete"></a>
                </p>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    <div class="paiement">
        <h1>TOTAL : <?=$total; ?>€</h1>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="index.php?page=order&action=new" class="toOrder"><img src="assets/img/Buttons/pay.png" class="creditCard" alt="credit Card icon"></a>
            <a href="index.php?page=order&action=new" class="toOrder"><img src="assets/img/Buttons/paypal.png" class="paypal" alt="paypal icon"></a>
        <?php else:?>
            <p>Vous n'avez-pas encore de compte ?<br> <a href="index.php?page=connexion&action=form">Connectez-vous</a> pour finaliser votre achat !</p><br>
        <?php endif;?>
    </div>
</div>
