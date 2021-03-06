<div class="products_container">
    <div class="filter">
        <form method="post" action="index.php?page=carteALunite&action=filter">
            <legend>CATÉGORIES</legend>
            <hr>
            <input type="checkbox" name="monstreNormal" id="monstreNormal" value="monstreNormal">
            <label for="monstreNormal">MONSTRE (NORMAL)</label><br>

            <input type="checkbox" name="monstreEffet" id="monstreEffet" value="monstreEffet">
            <label for="monstreEffet">MONSTRE (EFFET)</label><br>

            <input type="checkbox" name="magie" id="magie" value="magie">
            <label for="magie">MAGIE</label><br>

            <input type="checkbox" name="piege" id="piege" value="piege">
            <label for="piege">PIÈGE</label><br>

            <input type="checkbox" name="rituel" id="rituel" value="rituel">
            <label for="rituel">RITUEL</label><br>

            <input type="checkbox" name="fusion" id="fusion" value="fusion">
            <label for="fusion">FUSION</label><br>

            <input type="checkbox" name="synchro" id="synchro" value="synchro">
            <label for="synchro">SYNCHRO</label><br>

            <input type="checkbox" name="xyz" id="xyz" value="xyz">
            <label for="xyz">XYZ</label><br>

            <input type="checkbox" name="pendulum" id="pendulum" value="pendulum">
            <label for="pendulum">PENDULUM</label><br>

            <input type="checkbox" name="link" id="link" value="link">
            <label for="link">LINK</label><br><br>

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
            <?php while ($i<sizeof($cards)):?>
                <?php foreach ($cards as $card): ?>
                    <div class="productCase"
                         onmouseover="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='flex'"
                         onmouseout="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='none'">
                        <?php $i++;?>
                        <a href="index.php?page=produitsScelles&action=productPage&id=<?=$card['id'];?>" >

                            <div class="productImage">
                                <?php foreach ($cardImages as $cardImage): ?>
                                    <?php if ($card['id'] == $cardImage['product_id'] && $cardImage['main_image'] == 1):?>
                                        <img src="assets/img/product/<?=$cardImage['name'];?>" class="product" alt="<?=$card['name'];?>">
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>

                            <div class="productDescription">
                                <p>
                                    <?=$card['name'];?><br>
                                    <?=$card['price'];?>€
                                </p>
                                <a href="index.php?page=produitsScelles&action=productPage&id=<?=$card['id'];?>"><input type="button" value="Voir le produit"></a>
                            </div>
                        </a>
                    </div>
                <?php endforeach;?>
            <?php endwhile;?>
        </div>
    </div>
</div>

