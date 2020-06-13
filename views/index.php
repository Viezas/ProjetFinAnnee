<!-- CAROUSELLE -->
<div class="carouselle">

    <div class="bannerContainer">
        <div class="banner">
            <a href="index.php?page=accessoires">
                <img src="assets/img/Produits_Scellés/Booster.png" class="bannerImg" alt="Booster : Savage Strike">
            </a>
        </div>

        <div class="banner">
            <a href="index.php?page=accessoires">
                <img src="assets/img/Produits_Scellés/Tin6.png" class="bannerImg" alt="TinBox">
            </a>
        </div>

        <div class="banner">
            <a href="index.php?page=accessoires">
                <img src="assets/img/Monstres/Z-ARC.jpg" class="bannerImg" alt="Z-ARC">
            </a>
        </div>
    </div>

    <!-- Voir la page associé au produit -->
    <div class="bannerBtn">
        <a href="index.php?page=accessoires"><input type="button" value="Voir le produit"></a>
    </div>

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

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[0].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[0].style.display='none'">
            <a href="index.php?page=accessoires" >
            <div class="productImage">
                <img src="assets/img/Produits_Scellés/Booster.png" class="booster" alt="Booster : Savage Strike">
            </div>
            <div class="productDescription">
                <p>
                    Booster :<br>
                    Savage Strike<br>
                    1.20€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[1].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[1].style.display='none'">
            <a href="index.php?page=accessoires">
            <img src="assets/img/Produits_Scellés/Tin6.png" class="tinBox" alt="TinBox">
            <div class="productDescription">
                <p>
                    TinBox 2019 :<br>
                    Sarcophage Doré<br>
                    20.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[2].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[2].style.display='none'">
            <a href="index.php?page=accessoires">
            <img src="assets/img/Monstres/Z-ARC.jpg" class="card" alt="Z-ARC">
            <div class="productDescription">
                <p>
                    Monstre :<br>
                    Z-ARC<br>
                    1.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>
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
            <a href="index.php?page=accessoires">
            <img src="assets/img/Pièges/Normal2.jpg" class="card" alt="Piège : Force de Miroir">
            <div class="productDescription">
                <p>
                    Piège :<br>
                    Force de Miroir<br>
                    2.50€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[4].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[4].style.display='none'">
            <a href="index.php?page=accessoires">
            <img src="assets/img/Accessoires/CardSleeve.jpg" class="cardSlevee" alt="Protèges cartes">
            <div class="productDescription">
                <p>
                    Accessoires :<br>
                    Protèges cartes Ash Blossom<br>
                    4.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[5].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[5].style.display='none'">
            <a href="index.php?page=accessoires">
            <img src="assets/img/Monstres/CrystalWing.jpg" class="card" alt="Dragon synchro de l'aile de cristal">
            <div class="productDescription">
                <p>
                    Monstre :<br>
                    Dragon synchro de l'aile de cristal<br>
                    1.50€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
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
            <a href="index.php?page=accessoires">
            <img src="assets/img/Pièges/Continue.jpg" class="card" alt="Piège continue : Lanceur de la Force de Miroir">
            <div class="productDescription">
                <p>
                    Piège continue :<br>
                    Lanceur de la Force de Miroir<br>
                    1.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[7].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[7].style.display='none'">
            <a href="index.php?page=accessoires">
            <img src="assets/img/Magie/Normal2.jpg" class="card" alt="Magie : Monster Reborn">
            <div class="productDescription">
                <p>
                    Magie :<br>
                    Monster Reborn<br>
                    2.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>

        <div class="productCase"
             onmouseover="document.getElementsByClassName('productDescription')[8].style.display='flex'"
             onmouseout="document.getElementsByClassName('productDescription')[8].style.display='none'">
            <a href="index.php?page=accessoires" >
            <img src="assets/img/Magie/Rapide2.jpg" class="card" alt="Magie rapide : Super Polymérisation">
            <div class="productDescription">
                <p>
                    Magie rapide :<br>
                    Super Polymérisation<br>
                    5.00€
                </p>
                <a href="index.php?page=produitsScelles&action=list"><input type="button" value="Voir le produit"></a>
            </div>
            </a>
        </div>
    </div>
</div>

<script src="assets/js/caroussel.js"></script>