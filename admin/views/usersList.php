<h2>Utilisateurs : </h2>

<?php if(isset($_SESSION['messages'])): ?>
    <div>
        <?php foreach($_SESSION['messages'] as $message): ?>
            <h3><?= $message ?></h3>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="add">
    <a href="index.php?page=users&action=new">Ajouter un utilisateur</a>
</div>
<hr>

<table>
    <thead>
    <tr>
        <td><p>Nom</p></td>
        <td><p>Prénom</p></td>
        <td><p>Email</p></td>
        <td><p>Adress</p></td>
        <td><p>Statut</p></td>
    </tr>
    </thead>
    <?php foreach ($users as $user): ?>
    <tr>
        <td>
            <p>
                <?=$user['last_name']; ?>
            </p>
        </td>
        <td>
            <p>
                <?=$user['first_name']; ?>
            </p>
        </td>
        <td>
            <p>
                <?=$user['email']; ?>
            </p>
        </td>
        <td>
            <p>
                <?=$user['adress']; ?>
            </p>
        </td>
        <td>
            <p>
                <?php if ($user['is_admin'] == 1): ?>
                    <?= 'Admin'; ?>
                <?php else: ?>
                    <?= 'Non Admin'; ?>
                <?php endif; ?>
            </p>
        </td>
        <td>
            <a href="index.php?page=users&action=edit&id=<?= $user['id'] ?>">Modifier</a>
        </td>
        <td>
            <a href="index.php?page=users&action=delete&id=<?= $user['id'] ?>" class="deleteUser">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>