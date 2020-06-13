<div class="connexionContainer">

    <form action="index.php?page=inscription&action=register" method="post">

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
            <?php foreach ($_SESSION['messages'] as $message): ?>
                <div class="message">
                    <h1><?= $message;?></h1>
                </div>
            <?php endforeach;?>
        <?php endif;?>

        <div class="last_name">
            <label for="last_name" id="last_name">Nom</label>
            <input id="last_name" type="text" name="last_name" required><br>
        </div>

        <div class="first_name">
            <label for="first_name" id="first_name">Prenom</label>
            <input id="first_name" type="text" name="first_name" required><br>
        </div>

        <div class="adress">
            <label for="adress" id="adress">Adresse</label>
            <input id="adress" type="text" name="adress" required><br>
        </div>

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

    <small>Vous n'avez déjà un compte ? <a href="index.php?page=connexion&action=form">Connectez-vous !</a></small>

</div>