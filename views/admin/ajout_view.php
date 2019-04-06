<div class="bloc-1"></div>

<h1 class="text-center">Ajout d'un article</h1>

<div class="bloc-1"></div>

<div>
    <form action="ajout.php" method="post">

        <input class="col-6 offset-3" type="text" name="titre" id="titre" placeholder="Nom du produit" required>
        <input class="col-6 offset-3" type="text" name="description" id="description" placeholder="Description du produit" required>
        <input class="col-6 offset-3" type="number" name="prix" id="email" placeholder="Prix du produit" min="0" required>
        <!-- <select data-placeholder="Catégories" name="categories[]" id="categorie_select" multiple>
            <option value="1">Catégorie 1</option>
            <option value="2">Catégorie 2</option>
            <option value="3">Catégorie 3</option>
            <option value="4">Catégorie 4</option>
        </select> -->
        <button class="col-6 offset-3" type="submit" value="OK">Ajouter le produit</button>
    </form>
</div>