<div class="bloc-1"></div>

<h1 class="text-center">Gestion des catégories</h1>

<div class="bloc-1"></div>

<div>
<h2 class="text-center">Ajouter une catégorie</h2>
    <form action="categories.php" method="post">

        <input class="col-6 offset-3" type="text" name="categorie" id="categorie" placeholder="Nom de la catégorie" required>
        <button class="col-6 offset-3" type="submit" value="OK">Ajouter la catégorie</button>
    </form>
</div>

<div class="bloc-1"></div>

<div class="col-6 offset-3">
    <h2 class="text-center">Gérer les catégories</h2>
    <div id="categories">
        <table class="categories" id="liste_categories">
            <?php 
                foreach ($categories as $categorie)
                {
                    echo '<tr>
                        <td class="col-2"><p>'.$categorie[1].'</p>
                        <td class="col-2 text-center"><a href="#" onclick="update_categorie('.$categorie[0].', \''.$categorie[1].'\')" class="update"><i class="fas fa-pen"></a></i></td>
                        <td class="col-2 text-right"><a href="#" onclick="delete_categorie('.$categorie[0].', \''.$categorie[1].'\')" class="delete"><i class="fas fa-trash"></a></i></td>
                    </tr>';
                }
            ?>
        </table>
    </div>
</div>

<script>

function delete_categorie(id, categorie) {
  var r = confirm("Voulez vous supprimer la catégorie \"" + categorie + "\"?");
  if (r == true) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://localhost/admin/categories.php?del=' + id, true); 
    req.send();
    location.reload();
  }
}

function update_categorie(id, categorie) {
  var categorie = prompt("Modifier la catégorie \"" + categorie + "\"?", categorie);
  if (categorie != null) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://localhost/admin/categories.php?update=' + id + '&content=' + categorie, true); 
    req.send();
    location.reload();
  }
}

</script>