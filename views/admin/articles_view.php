<div class="bloc-1"></div>

<h1 class="text-center">Gestion des articles</h1>

<div class="bloc-1"></div>

<div>

<div class="offset-2">
    <table class="articles" id="liste_articles">
        <thead>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Supprimer ?</th>
        </thead>
        <tbody>
        <?php 
            foreach ($articles as $article)
            {
                echo '<tr>
                    <td class="td1 col-2"><p>'.$article[1].'</p><a href="#" onclick="update_article_titre('.$article[0].', \''.$article[1].'\')" class="update"><i class="fas fa-pen"></i></a></td>
                    <td class="td2 col-2"><p>'.$article[2].'</p><a href="#" onclick="update_article_desc('.$article[0].', \''.$article[1].'\', \''.$article[2].'\')" class="update"><i class="fas fa-pen"></i></a></td>
                    <td class="td3 col-2">'.$article[3].'€<a href="#" onclick="update_article_prix('.$article[0].', \''.$article[1].'\', \''.$article[3].'\')" class="update"><i class="fas fa-pen"></i></a></td>
                    <td class="td4 col-2 text-right"><a href="#" onclick="delete_article('.$article[0].', \''.$article[1].'\')" class="delete"><i class="fas fa-trash"></a></i></td>
                </tr>';
            }
        ?>
        </tbody>
    </table>
</div>

<div class="bloc-1"></div>

<script>

function delete_article(id, article) {
  var r = confirm("Voulez vous supprimer l'article' \"" + article + "\"?");
  if (r == true) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://localhost/admin/articles.php?del=' + id, true); 
    req.send();
    location.reload();
  }
}

function update_article_titre(id, article) {
  var article = prompt("Modifier l'article \"" + article + "\"?", article);
  if (article != null) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://localhost/admin/articles.php?update=' + id + '&titre=' + article, true); 
    req.send();
  }
  location.reload();
}

function update_article_desc(id, article, desc) {
  var desc = prompt("Modifier l'article \"" + article + "\"?", desc);
  if (desc != null) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://localhost/admin/articles.php?update=' + id + '&desc=' + desc, true); 
    req.send();
    console.log(desc)
  }
  location.reload();
}

function update_article_prix(id, article, prix) {
  var prix = prompt("Modifier l'article \"" + article + "\"?", prix);
  if (prix != null) {
    const req = new XMLHttpRequest();
    req.open('GET', 'http://localhost/admin/articles.php?update=' + id + '&prix=' + prix, true); 
    req.send();
    }
  location.reload();
}

</script>