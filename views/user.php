<h1>Bonjour <?= $_SESSION['user']['first_name'];?></h1>

<div class="linkContainer">
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
        <?php if ($_SESSION['user']['is_admin'] == 1): ?>
            <a href="admin/index.php">Page admin</a><br>
        <?php endif; ?>
    </div>

    <div>
        <a href="index.php?page=connexion&action=disconnect">Deconnexion</a>
    </div>

</div>

<?php var_dump($_SESSION['user']); ?>