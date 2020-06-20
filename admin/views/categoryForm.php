<div class="formContainer">

    <form action="index.php?page=categories&action=<?= isset($category) || isset($_SESSION['old_inputs']) && $_GET['action'] != 'new' ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
            <?php foreach ($_SESSION['messages'] as $message): ?>
                <div class="message">
                    <h1><?= $message;?></h1>
                </div>
            <?php endforeach;?>
        <?php endif;?>

        <div class="name">
            <label for="name">Nom</label>
            <input id="name" type="text" name="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($category) ? $category['name'] : '' ?>" required><br>
        </div>

        <div class="description">
            <label for="description">Description</label>
            <textarea id="description" name="description"><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($category) ? $category['description'] : '' ?></textarea>
        </div>

        <?php if (isset($category['image']) && !empty($category['image'])): ?>
            <div>
                <p>Image actuelle :</p>
                <img src="assets/img/category/<?= $category['image']; ?>" alt="Image de la catégorie <?= $category['name'];?>">
            </div>
        <?php endif; ?>


        <div class="image">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" required><br>
        </div>

        <input type="submit" value="Valider">

    </form>

</div>
