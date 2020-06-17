<div class="formContainer">

    <form action="index.php?page=images&action=<?= isset($image) || isset($_SESSION['old_inputs']) && $_GET['action'] != 'new' ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
            <?php foreach ($_SESSION['messages'] as $message): ?>
                <div class="message">
                    <h1><?= $message;?></h1>
                </div>
            <?php endforeach;?>
        <?php endif;?>

        <?php if (isset($image['name']) && !empty($image['name'])): ?>
            <div>
                <h1>Image actuelle :</h1>
                <img src="../assets/img/product/<?= $image['name']; ?>" alt="Image du produit <?= $_SESSION['productId'];?>">
            </div>
        <?php endif; ?>

        <div class="image">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" /><br>
        </div>

        <div class="is_main">
            <label for="is_main">Image principale</label>
            <input type="checkbox" id="is_main" name="is_main" <?php if(isset($image)&& $image['main_image']== 1): ?>checked<?php endif; ?>>
        </div>

        <div class="is_activated">
            <label for="is_activated">Activer</label>
            <select name="is_activated" id="is_activated" required>
                <option value="0" <?php if(isset($image)&& $image['is_activated']== 0): ?>selected="selected"<?php endif; ?>>Non</option>
                <option value="1" <?php if(isset($image)&& $image['is_activated']== 1): ?>selected="selected"<?php endif; ?>>Oui</option>
            </select>
        </div>

        <input type="submit" value="Valider">

    </form>

</div>