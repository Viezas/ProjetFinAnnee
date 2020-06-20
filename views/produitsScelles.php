<div class="products_container">
    <div class="filter">
        <form method="post" action="index.php?page=produitsScelles&action=filter">
            <legend>CATÉGORIES</legend>
            <hr>
            <input type="checkbox" name="deckStructure" id="deckStructure" value="deckStructure">
            <label for="deckStructure">DECK DE STRUCTURE</label><br>

            <input type="checkbox" name="deckDemarrage" id="deckDemarrage" value="deckDemarrage">
            <label for="deckDemarrage">DECK DE DÉMARRAGE</label><br>

            <input type="checkbox" name="booster" id="booster" value="booster">
            <label for="booster">BOOSTER</label><br>

            <input type="checkbox" name="tinbox" id="tinbox" value="tinbox">
            <label for="tinbox">TINBOX</label><br><br>

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
            <?php while ($i<sizeof($scelledProducts)):?>
                <?php foreach ($scelledProducts as $scelledProduct): ?>
                    <div class="productCase"
                         onmouseover="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='flex'"
                         onmouseout="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='none'">
                        <?php $i++;?>
                        <a href="index.php?page=produitsScelles&action=productPage&id=<?=$scelledProduct['id'];?>" >

                            <div class="productImage">
                                <?php foreach ($ScelledProductImages as $ScelledProductImage): ?>
                                <?php if ($scelledProduct['id'] == $ScelledProductImage['product_id'] && $ScelledProductImage['main_image'] == 1):?>
                                <img src="assets/img/product/<?=$ScelledProductImage['name'];?>" class="product" alt="<?=$scelledProduct['name'];?>">
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>

                            <div class="productDescription">
                                <p>
                                    <?=$scelledProduct['name'];?><br>
                                    <?=$scelledProduct['price'];?>€
                                </p>
                                <a href="index.php?page=produitsScelles&action=productPage&id=<?=$scelledProduct['id'];?>"><input type="button" value="Voir le produit"></a>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endwhile;?>
        </div>
    </div>
</div>