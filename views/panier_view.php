<div class="col-6 offset-3 text-center">
    <h1>panier</h1>
</div>
<?php

if(!isset($_SESSION['panier']))
{
    echo 'Oh non, votre panier est vide !<br>';
}
else
{
    $panier = json_decode($_SESSION['panier']);
    $prix = array();
    foreach($panier as $article)
    {
        if($article->quantite != 0)
        {
            echo 'id : '.$article->id;
            echo ', titre : '.$article->titre;
            echo ', prix : '.$article->prix;
            echo ', quantite : '.$article->quantite;
            echo '<a onclick=plus('.$article->id.')> <i class="fas fa-plus"></i> </a>';
            echo '<a onclick=moins('.$article->id.')> <i class="fas fa-minus"></i> </a>';
            echo '<a onclick=retirer('.$article->id.')> <i class="fas fa-trash"></i> </a>';
            echo ', sous-total : '.($article->quantite * $article->prix).'<br>';
            $prix[] =  $article->quantite * $article->prix;
        }
        
    }
    $total = 0;
    foreach ($prix as $row) {
        $total += $row;
    }
    if($total == 0)
        echo 'Oh non, votre panier est vide !<br>';
    else{
        echo 'total : '.$total.'<br>';
        echo '<a href="valider.php">Passer ma commande</a>';
    }
}

?>

<script type="text/javascript">
    function plus(id)
    {
        const req = new XMLHttpRequest();
        req.open('GET', 'http://localhost/acheter.php?id=' + id, true);
        req.send();
        location.reload();
    }

    function moins(id)
    {
        const req = new XMLHttpRequest();
        req.open('GET', 'http://localhost/moins.php?id=' + id, true);
        req.send();
        location.reload();
    }

    function retirer(id)
    {
        const req = new XMLHttpRequest();
        req.open('GET', 'http://localhost/retirer.php?id=' + id, true);
        req.send();
        location.reload();
    }
</script>