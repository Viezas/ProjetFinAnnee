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
                <td><p>Id utilisateur</p></td>
                <td><p>Nom</p></td>
                <td><p>Prénom</p></td>
                <td><p>Total de la commande</p></td>
                <td><p>Adresse de livraison</p></td>
                <td><p>Date</p></td>
            </tr>
            </thead>
            <?php $total = 0 ?>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><p><?= $order['user_id'] ;?></p></td>
                <td><p><?= $order['last_name'] ;?></p></td>
                <td><p><?= $order['first_name'] ;?></p></td>
                <td><p>€</p></td>
                <td><p><?= $order['delivery_adress'] ;?></p></td>
                <td><p><?= $order['date'] ;?></p></td>
                <td><a href="index.php?page=orders&action=details&order_id=<?= $order['id'] ;?>">Détail de la commande</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

