<h1>Bonjour <?= $_SESSION['user']['first_name'];?></h1>

<div class="linkContainer">

    <?php if ($_SESSION['user']['is_admin'] == 1): ?>
        <div>
            <a href="admin/index.php">Page admin</a>
        </div>
    <?php endif; ?>

    <div>
        <a href="index.php?page=user&action=modifyInfos">Mes informations</a>
    </div>

    <div>
        <a href="index.php?page=cart&action=displayCart">Mon panier</a>
    </div>

    <div>
        <a href="index.php?page=order&action=list">Mes commandes</a>
    </div>

    <div>
        <a href="index.php?page=connexion&action=disconnect">Deconnexion</a>
    </div>
</div>