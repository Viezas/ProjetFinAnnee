<div class="infoContainer">
    <fieldset>
        <legend>VOS INFORMATIONS</legend>

        <div class="connexionContainer">

            <form action="index.php?page=user&action=modifyInfos" method="post" enctype="multipart/form-data">

                <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
                    <?php foreach ($_SESSION['messages'] as $message): ?>
                        <div class="message">
                            <h1><?= $message;?></h1>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>

                <div class="last_name">
                    <label for="last_name" id="last_name">Nom</label>
                    <input id="last_name" type="text" name="last_name" value="<?php if(isset($user) && !empty($user)): ?> <?= $user['last_name'];?> <?php else: ?> <?= '';?> <?php endif;?>" required><br>
                </div>

                <div class="first_name">
                    <label for="first_name" id="first_name">Prenom</label>
                    <input id="first_name" type="text" name="first_name" value="<?php if(isset($user) && !empty($user)): ?> <?= $user['first_name'];?> <?php else: ?> <?= '';?> <?php endif;?>" required><br>
                </div>

                <div class="adress">
                    <label for="adress" id="adress">Adresse</label>
                    <input id="adress" type="text" name="adress" value="<?php if(isset($user) && !empty($_SESSION['user'])): ?> <?= $user['adress'];?> <?php else: ?> <?= '';?> <?php endif;?>" required><br>
                </div>

                <div class="email">
                    <label for="email" id="emailLabel">Email</label>
                    <input id="email" type="email" name="email" value="<?php if(isset($user) && !empty($user)): ?> <?= $user['email'];?> <?php else: ?> <?= '';?> <?php endif;?>"><br>
                </div>

                <div class="password">
                    <label for="password" id="passwordLabel">Mot de passe</label>
                    <input id="password" type="password" name="password" required><br>
                </div>

                <input type="submit" value="Valider les modifications">

            </form>

        </div>

    </fieldset>
</div>