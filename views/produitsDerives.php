<div class="products_container">
    <div class="filter">
        <form method="post" action="index.php?page=produitsDerives&action=filter">
            <legend>CATÉGORIES</legend>
            <hr>
            <input type="checkbox" name="cardSlevee" id="cardSlevee" value="cardSlevee">
            <label for="cardSlevee">FIGURINE</label><br>

            <input type="checkbox" name="classeur" id="classeur" value="classeur">
            <label for="classeur">BIJOU</label><br>

                <input type="checkbox" name="deckCase" id="deckCase" value="deckCase">
                <label for="deckCase">DUEL DISK</label><br>

                <input type="checkbox" name="playmat" id="playmat" value="playmat">
                <label for="playmat">PORTE CLÉ</label><br>

                <input type="checkbox" name="playmat" id="playmat" value="playmat">
                <label for="playmat">TASSE</label><br><br>

                <legend>PRIX</legend>
                <hr>
                <input type="checkbox" name="croissant" id="croissant" value="croissant">
                <label for="croissant">CROISSANT</label><br>

                <input type="checkbox" name="decroissant" id="decroissant" value="decroissant">
                <label for="decroissant">DÉCROISSANT</label><br><br>

                <legend>DATE</legend>
                <hr>
                <input type="checkbox" name="recent" id="recent" value="recent">
                <label for="recent">+ RECENT</label><br>

                <input type="checkbox" name="vieux" id="vieux" value="vieux">
                <label for="vieux">- RECENT</label><br><br>

                <legend>ORDRE ALPHABÉTIQUE</legend>
                <hr>
                <input type="checkbox" name="az" id="az" value="az">
                <label for="az">A-Z</label><br>

                <input type="checkbox" name="za" id="za" value="za">
                <label for="za">Z-A</label><br><br>

                <input type="submit" value="Valider le filtrage">
        </form>
    </div>

    <div class="productContainer">
        <div class="productCase_Container">
            <?php while ($i<sizeof($byProducts)):?>
                <?php foreach ($byProducts as $byProduct): ?>
                    <div class="productCase"
                         onmouseover="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='flex'"
                         onmouseout="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='none'">
                        <?php $i++;?>
                        <a href="index.php?page=produitsScelles&action=productPage&id=<?=$byProduct['id'];?>" >

                            <div class="productImage">
                                <?php foreach ($byProductImages as $byProductImage): ?>
                                    <?php if ($byProduct['id'] == $byProductImage['product_id'] && $byProductImage['main_image'] == 1):?>
                                        <img src="assets/img/product/<?=$byProductImage['name'];?>" class="product" alt="<?=$byProduct['name'];?>">
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>

                            <div class="productDescription">
                                <p>
                                    <?=$byProduct['name'];?><br>
                                    <?=$byProduct['price'];?>€
                                </p>
                                <a href="index.php?page=produitsScelles&action=productPage&id=<?=$byProduct['id'];?>"><input type="button" value="Voir le produit"></a>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endwhile;?>
        </div>
    </div>
</div>