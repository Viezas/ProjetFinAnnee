<div class="formContainer">

    <form action="index.php?page=products&action=<?= isset($product) || isset($_SESSION['old_inputs']) && $_GET['action'] != 'new' ? 'edit&id='. $_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">

        <?php if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])): ?>
            <?php foreach ($_SESSION['messages'] as $message): ?>
                <div class="message">
                    <h1><?= $message;?></h1>
                </div>
            <?php endforeach;?>
        <?php endif;?>

        <div class="name">
            <label for="name">Nom</label>
            <input id="name" type="text" name="name" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?><?= isset($product) ? $product['name'] : '' ?>" required><br>
        </div>

        <div class="price">
            <label for="price">Prix</label>
            <input id="price" type="text" name="price" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?><?= isset($product) ? $product['price'] : '' ?>" required><br>
        </div>

        <div class="quantity">
            <label for="quantity">Quantité</label>
            <input id="quantity" type="number" min="1" name="quantity" value="<?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : '' ?><?= isset($product) ? $product['quantity'] : '' ?>" required><br>
        </div>

        <div class="categories">
            <label for="category_id">Admin</label>
            <select name="category_id[]" id="category_id" multiple required>
                <option value="">Aucune</option>
                <?php foreach ($categories as $categoryForProduct): ?>
                <option value="<?=$categoryForProduct['id'];?>"><?=$categoryForProduct['name'];?></option>
                <?php endforeach;?>
            </select>
        </div>

        <div class="description">
            <label for="description">Description</label>
            <textarea id="description" name="description" required><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?><?= isset($product) ? $product['description'] : '' ?></textarea>
        </div>

        <?php if (isset($product['image']) && !empty($product['image'])): ?>
            <div>
                <p>Image actuelle :</p>
                <img src="../assets/img/product/<?= $product['image']; ?>" alt="Image du produit <?= $product['name'];?>">
            </div>
        <?php endif; ?>


        <div class="image">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" required/><br>
        </div>

        <div class="is_activated">
            <label for="is_activated">Activer</label>
            <input type="checkbox" id="is_activated" name="is_activated" checked>
        </div>

        <input type="submit" value="Valider">

    </form>

</div>

