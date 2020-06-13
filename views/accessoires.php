<div class="products_container">
    <div class="filter">
        <form method="post" action="index.php?page=accessoires&action=filter">
            <legend>CATÉGORIES</legend>
            <hr>
            <input type="checkbox" name="cardSlevee" id="cardSlevee" value="cardSlevee">
            <label for="cardSlevee">PROTÈGE CARTE</label><br>

            <input type="checkbox" name="classeur" id="classeur" value="classeur">
            <label for="classeur">CLASSEURS</label><br>

            <input type="checkbox" name="deckCase" id="deckCase" value="deckCase">
            <label for="deckCase">DECK CASE</label><br>

            <input type="checkbox" name="playmat" id="playmat" value="playmat">
            <label for="playmat">TAPI DE JEU</label><br><br>

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
            <!-- Foreach ici -->
            <div class="productCase"
                 onmouseover="document.getElementsByClassName('productDescription')[0].style.display='flex'"
                 onmouseout="document.getElementsByClassName('productDescription')[0].style.display='none'">
                <a href="index.php?page=accessoires">
                    <img src="assets/img/Accessoires/CardSleeve.jpg" class="product" alt="Protèges cartes">
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
        </div>
    </div>
</div>
