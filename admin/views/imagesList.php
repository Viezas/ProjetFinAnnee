<h2>Catégories : </h2>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <h3 style="color: red"><?= $message ?></h3>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="btnContainer">
    <div class="add">
        <a href="index.php?page=products&action=list">Page des produits</a>
    </div>

    <div class="add">
        <a href="index.php?page=images&action=new&id=<?=$_SESSION['productId'];?>">Ajouter une image</a>
    </div>
</div>
<hr>

<table>
    <thead>
    <tr>
        <td><p>Image principale</p></td>
    </tr>
    </thead>
    <?php foreach ($productMainImages as $productMainImage): ?>
        <tr>
            <td>
                <p>
                    <?= $productMainImage['name'];?>
                </p>
            </td>
            <td>
                <a href="index.php?page=images&action=edit&id=<?= $productMainImage['id'] ?>">Modifier</a>
            </td>
            <td>
                <a href="index.php?page=images&action=delete&id=<?= $productMainImage['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<table>
    <thead>
    <tr>
        <td><p>Image secondaire</p></td>
    </tr>
    </thead>
    <?php foreach ($productSecondaryImages as $productSecondaryImage): ?>
        <tr>
            <td>
                <p>
                    <?= $productSecondaryImage['name']; ?>
                </p>
            </td>
            <td>
                <a href="index.php?page=images&action=edit&id=<?= $productSecondaryImage['id'] ?>">Modifier</a>
            </td>
            <td>
                <a href="index.php?page=images&action=delete&id=<?= $productSecondaryImage['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>