<div class="ordersContainer">
    <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
        <?php foreach ($_SESSION['messages'] as $message): ?>
            <div class="message">
                <h1><?= $message;?></h1>
            </div>
        <?php endforeach;?>
    <?php endif;?>

    <table>
        <h1>Details : </h1>
        <thead>
        <tr>
            <td><h2>Nom</h2></td>
            <td><h2>Prix</h2></td>
            <td><h2>Quantité</h2></td>
            <td><h2>Total de la ligne</h2></td>
        </tr>
        </thead>
        <?php $total = 0;?>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><p><?= $order['name'] ;?></p></td>
                <td><p><?= $order['price'] ;?></p></td>
                <td><p><?= $order['quantity'] ;?></p></td>
                <td><p><?= $rowTotal = $order['quantity'] * $order['price'] ;?>€</p></td>
                <?php $total += $rowTotal;?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"><h2>Total des produits : <?= $total ;?>€</h2></td>
        </tr>
    </table>
</div>