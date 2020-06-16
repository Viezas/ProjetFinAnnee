<h1>Bonjour <?= $_SESSION['user']['first_name'];?></h1>

<div class="linkContainer">

    <?php if ($_SESSION['user']['is_admin'] == 1): ?>
        <div>
            <a href="index.php?page=admin">Page admin</a>
        </div>
    <?php endif; ?>

    <div>
        <a href="">Mes informations</a>
    </div>

    <div>
        <a href="">Mon panier</a>
    </div>

    <div>
        <a href="">Mes commandes</a>
    </div>

    <div>
        <a href="index.php?page=connexion&action=disconnect">Deconnexion</a>
    </div>
</div>

<?php var_dump($_SESSION['cart']); ?>