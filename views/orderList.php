<div class="ordersContainer">
    <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
        <?php foreach ($_SESSION['messages'] as $message): ?>
            <div class="message">
                <h1><?= $message;?></h1>
            </div>
        <?php endforeach;?>
    <?php endif;?>
    <table>
        <table>
            <thead>
            <tr>
                <td><h2>Nom</h2></td>
                <td><h2>Prénom</h2></td>
                <td><h2>Adresse de livraison</h2></td>
                <td><h2>Date</h2></td>
            </tr>
            </thead>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><p><?= $order['last_name'] ;?></p></td>
                <td><p><?= $order['first_name'] ;?></p></td>
                <td><p><?= $order['delivery_adress'] ;?></p></td>
                <td><p><?= $order['date'] ;?></p></td>
                <td><a href="index.php?page=order&action=details&order_id=<?= $order['id'] ;?>">Détail de la commande</a></td>
            </tr>
            <?php endforeach; ?>
    </table>
</div>

