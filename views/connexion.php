<div class="connexionContainer">
    <form action="index.php?page=connexion&action=connexion" method="post" enctype="multipart/form-data">

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
            <?php foreach ($_SESSION['messages'] as $message): ?>
                <div class="message">
                    <h1><?= $message;?></h1>
                </div>
            <?php endforeach;?>
        <?php endif;?>

        <div class="email">
            <label for="email" id="emailLabel">Email</label>
            <input id="email" type="email" name="email" required><br>
        </div>

        <div class="password">
            <label for="password" id="passwordLabel">Mot de passe</label>
            <input id="password" type="password" name="password" required><br>
        </div>

        <input type="submit" value="Connexion">

    </form>

    <small>Vous n'avez-pas encore de compte ? <a href="index.php?page=inscription&action=form">Inscrivez-vous !</a></small><br>
    <small><a href="index.php">Mot de passe oublié ?</a></small>
</div>