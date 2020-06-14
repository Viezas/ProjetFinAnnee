<div class="formContainer">

    <form action="index.php?page=users&action=<?= isset($user) || isset($_SESSION['old_inputs']) && $_GET['action'] != 'new' ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post">

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
            <?php foreach ($_SESSION['messages'] as $message): ?>
                <div class="message">
                    <h1><?= $message;?></h1>
                </div>
            <?php endforeach;?>
        <?php endif;?>

        <div class="last_name">
            <label for="last_name" id="last_name">Nom</label>
            <input id="last_name" type="text" name="last_name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['last_name'] : '' ?><?= isset($user) ? $user['last_name'] : '' ?>" required><br>
        </div>

        <div class="first_name">
            <label for="first_name" id="first_name">Prenom</label>
            <input id="first_name" type="text" name="first_name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['first_name'] : '' ?><?= isset($user) ? $user['first_name'] : '' ?>" required><br>
        </div>

        <div class="adress">
            <label for="adress" id="adress">Adresse</label>
            <input id="adress" type="text" name="adress" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['adress'] : '' ?><?= isset($user) ? $user['adress'] : '' ?>" required><br>
        </div>

        <div class="email">
            <label for="email" id="emailLabel">Email</label>
            <input id="email" type="email" name="email" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?><?= isset($user) ? $user['email'] : '' ?>" required><br>
        </div>

        <div class="password">
            <label for="password" id="passwordLabel">Mot de passe</label>
            <input id="password" type="password" name="password"<?= isset($_SESSION['old_inputs']) || isset($user) ? '': 'required' ?>><br>
        </div>

        <div class="admin">
            <label for="is_admin" id="adminlabel">Admin</label>
            <select name="is_admin" id="is_admin" required>
                <option value="0" <?php if(isset($user) && $user['is_admin'] == 0):?> selected="selected"<?php endif; ?>>Non</option>
                <option value="1" <?php if(isset($user) && $user['is_admin'] == 1):?> selected="selected"<?php endif; ?>>Oui</option>
            </select>
        </div>

        <input type="submit" value="Ajouter l'utilisateur">

    </form>

</div>
