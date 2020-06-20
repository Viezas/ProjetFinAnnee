<!-- CAROUSELLE -->
<div class="carouselle">

    <div class="bannerContainer">
        <?php foreach ($news as $new): ?>
            <div class="banner">
                <?php foreach ($newsImages as $newsImage): ?>
                    <?php if ($new['id'] == $newsImage['product_id'] && $newsImage['main_image'] == 1):?>
                        <a href="index.php?page=produitsScelles&action=productPage&id=<?=$new['id'];?>">
                            <img src="assets/img/product/<?=$newsImage['name'];?>" class="bannerImg" alt="<?=$new['name'];?>">
                        </a>
                        <div class="bannerBtn">
                            <a href="index.php?page=produitsScelles&action=productPage&id=<?=$new['id'];?>"><input type="button" value="Voir le produit"></a>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
        <?php endforeach;?>
    </div>

    <!-- Voir la page associé au produit -->

    <a class="prev" onclick="plusSlides(-1)"><img src="assets/img/Buttons/back.png" class="arrow" alt="previous arrow"></a>
    <a class="next" onclick="plusSlides(1)"><img src="assets/img/Buttons/right-arrow.png" class="arrow" alt="next arrow"></a>

</div>
<br>
<div class="dots">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


<!-- NOUVEAUX PRODUITS -->
<div class="newProductContainer">
    <div class="title">
        <h1>NOUVEAUTÉS</h1>
        <hr>
    </div>

    <div class="new_ProductContainer">
        <?php while ($i<sizeof($news)):?>
            <?php foreach ($news as $new): ?>
                <div class="productCase"
                     onmouseover="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='flex'"
                     onmouseout="document.getElementsByClassName('productDescription')[<?=$i;?>].style.display='none'">
                    <?php $i++;?>
                    <a href="index.php?page=produitsScelles&action=productPage&id=<?=$new['id'];?>" >

                        <div class="productImage">
                            <?php foreach ($newsImages as $newsImage): ?>
                                <?php if ($new['id'] == $newsImage['product_id'] && $newsImage['main_image'] == 1):?>
                                    <img src="assets/img/product/<?=$newsImage['name'];?>" class="product" alt="<?=$new['name'];?>">
                                <?php endif;?>
                            <?php endforeach;?>
                        </div>

                        <div class="productDescription">
                            <p>
                                <?=$new['name'];?><br>
                                <?=$new['price'];?>€
                            </p>
                            <a href="index.php?page=produitsScelles&action=productPage&id=<?=$new['id'];?>"><input type="button" value="Voir le produit"></a>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>
        <?php endwhile;?>
    </div>
</div>


<!-- MEILLEURES VENTES -->
<div class="bestSellerContainer">
    <div class="title">
        <h1>MEILLEURES VENTES</h1>
        <hr>
    </div>

    <div class="bestSeller_ProductContainer">

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[3].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[3].style.display='none'">
            <a href="index.php?page=produitsScelles&action=productPage&id=80">
            <div class="productImage">
                <img src="assets/img/product/80-58.jpg" class="product" alt="Piège : Force de Miroir">
            </div>
            <div class="productDescription">
                <p>
                    Force de Miroir<br>
                    2.68€
                </p>
                <a href="index.php?page=produitsScelles&action=productPage&id=80"><input type="button" value="Voir le produit"></a>
            </div>

            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[4].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[4].style.display='none'">
            <a href="index.php?page=accessoires&action=productPage&id=51">
            <div class="productImage">
                <img src="assets/img/product/51-36.jpg" class="product" alt="Protèges cartes">
            </div>
            <div class="productDescription">
                <p>
                    Protèges cartes Ash Blossom<br>
                    5.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[5].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[5].style.display='none'">
            <a href="index.php?page=produitsScelles&action=productPage&id=83">
            <div class="productImage">
                <img src="assets/img/product/83-61.jpg" class="product" alt="Dragon synchro de l'aile de cristal">
            </div>
            <div class="productDescription">
                <p>
                    Dragon synchro de l'aile de cristal<br>
                    5.36€
                </p>
                <a href="index.php?page=produitsScelles&action=productPage&id=83"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>
    </div>
</div>


<!-- PRODUITS POPULAIRES -->
<div class="popularContainer">
    <div class="title">
        <h1>PRODUITS POPULAIRES</h1>
        <hr>
    </div>

    <div class="popular_ProductContainer">

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[6].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[6].style.display='none'">
            <a href="index.php?page=produitsScelles&action=productPage&id=68">
            <div class="productImage">
                <img src="assets/img/product/68-47.jpg" class="product" alt="Figurine pop Atem">
            </div>
            <div class="productDescription">
                <p>
                    Figurine Pop Atem<br>
                    10.00€
                </p>
                <a href="index.php?page=produitsScelles&action=productPage&id=68"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[7].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[7].style.display='none'">
            <a href="index.php?page=produitsScelles&action=productPage&id=79">
            <div class="productImage">
                <img src="assets/img/product/79-57.jpg" class="product" alt="Magie : Monster Reborn">
            </div>
            <div class="productDescription">
                <p>
                    Monster Reborn<br>
                    10.00€
                </p>
                <a href="index.php?page=produitsScelles&action=productPage&id=79"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[8].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[8].style.display='none'">
            <a href="index.php?page=produitsScelles&action=productPage&id=46" >
            <div class="productImage">
                <img src="assets/img/product/46-31.jpg" class="product" alt="Magie rapide : Super Polymérisation">
            </div>
            <div class="productDescription">
                <p>
                    Stater Deck Yu-Gi-Oh 5d's (2009)<br>
                    70.00€
                </p>
                <a href="index.php?page=produitsScelles&action=productPage&id=46"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>
    </div>
</div>

<script src="assets/js/caroussel.js"></script>