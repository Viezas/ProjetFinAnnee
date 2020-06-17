<h2>Catégories : </h2>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <h3><?= $message ?></h3>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="add">
    <a href="index.php?page=products&action=new">Ajouter un produit</a>
</div>

<hr>

<table>
    <thead>
    <tr>
        <td><p>Nom</p></td>
        <td><p>Prix</p></td>
        <td><p>Stock</p></td>
        <td><p>Catégorie</p></td>
        <td><p>Statut</p></td>
        <td><p>Images</p></td>
    </tr>
    </thead>
    <?php foreach ($products as $product): ?>
        <tr>
            <td>
                <p>
                    <?=$product['name']; ?>
                </p>
            </td>
            <td>
                <p>
                    <?=$product['price']; ?>€
                </p>
            </td>
            <td>
                <p>
                    <?=$product['stock']; ?>
                </p>
            </td>
            <td>
                <?php foreach ($productsCategories as $productsCategory): ?>
                    <?php foreach ($categories as $category): ?>
                        <?php if ($productsCategory['product_id'] == $product['id'] && $productsCategory['category_id'] == $category['id']): ?>
                        <p>
                            <?= $category['name']; ?>
                        </p>
                        <?php endif;?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <p>
                    <?php if (isset($product['is_activated']) && !empty($product['is_activated'])) :?>
                        Activé
                    <?php else:?>
                        Non activé
                    <?php endif; ?>
                </p>
            </td>
            <td>
                <a href="index.php?page=images&action=list&id=<?= $product['id'] ?>">Voir</a>
            </td>
            <td>
                <a href="index.php?page=products&action=edit&id=<?= $product['id'] ?>">Modifier</a>
            </td>
            <td>
                <a href="index.php?page=products&action=delete&id=<?= $product['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
