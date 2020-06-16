<h2>Catégories : </h2>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <h3><?= $message ?></h3>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="add">
    <a href="index.php?page=categories&action=new">Ajouter une catégorie</a>
</div>
<hr>

<table>
    <thead>
    <tr>
        <td><p>Nom</p></td>
        <td><p>Description</p></td>
        <td><p>Image</p></td>
    </tr>
    </thead>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td>
                <p>
                    <?=$category['name']; ?>
                </p>
            </td>
            <td>
                <p>
                    <?=$category['description']; ?>
                </p>
            </td>
            <td>
                <p>
                    <?php if (isset($category['image']) && !empty($category['image'])) :?>
                    Oui
                    <?php else:?>
                    Non
                    <?php endif; ?>
                </p>
            </td>
            <td>
                <a href="index.php?page=categories&action=edit&id=<?= $category['id'] ?>">Modifier</a>
            </td>
            <td>
                <a href="index.php?page=categories&action=delete&id=<?= $category['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
