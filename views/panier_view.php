<div class="bloc-1"></div>
<div id="w" class="col-10 offset-1">
    <header id="title">
      <h1>Mon Panier</h1>
    </header>
    <div id="page">
      <table id="cart">
          <?php if (isset($_SESSION['panier']))
          {
            echo '<thead>';
            echo '<tr>';
            echo '<th class="first">Photo</th>';
            echo '<th class="second">Qte</th>';
            echo '<th class="third">Produit</th>';
            echo '<th class="fourth">Total</th>';
            echo '<th class="fifth">&nbsp;</th>';
            echo '</tr>';
            echo '</thead>';
          }
        
        ?>
        <tbody>
        <?php 
        if(!isset($_SESSION['panier']))
        {
            echo '<h3 class=text-center>Oh non, votre panier est vide !</h3><br>';
        }
        else
        {
            $panier = json_decode($_SESSION['panier']);
            $prix = array();
            foreach($panier as $article)
            {
                if($article->quantite > 0)
                {
                    echo '<tr class="productitm">
                        <td><img src="https://www.parfumerie-burdin.com/media/caron/pour-un-homme/pour-un-homme-de-caron-parfum-75ml-14387-200x200.jpg" class="thumb"></td>
                        <td><input disabled="disabled" type="number" value="'.$article->quantite.'" min="0" max="99" class="qtyinput"><br>
                        <a onclick=plus('.$article->id.')><i class="fas fa-plus"></i> </a>
                        <a onclick=moins('.$article->id.')> <i class="fas fa-minus"></i></a></td>
                        <td>'.$article->titre.'</td>
                        <td>'.$article->prix.'</td>
                        <td><span class="remove"><a onclick=retirer('.$article->id.')> <i class="fas fa-trash"></i> </a></span></td>
                    </tr>';
                    $prix[] =  $article->quantite * $article->prix;
                }
                
            }
            $total = 0;
            foreach ($prix as $row) {
                $total += $row;
            }
            $total += 5;
            if($total == 0)
                echo '<h3 class=text-center>Oh non, votre panier est vide !</h3><br>';
            else{
                echo '
                <tr class="extracosts">
                    <td class="light">Frais de Livraison</td>
                    <td colspan="2" class="light"></td>
                    <td>5.00€</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="totalprice">
                    <td class="light">Total:</td>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2"><span class="thick">'.$total.'€</span></td>
                </tr>
                <tr class="checkoutrow">
                    <td colspan="5" class="checkout">
                    <i class="far fa-credit-card"></i>
                    <i class="fab fa-cc-paypal"></i>
                    <i class="fab fa-cc-amex"></i>
                    <button id="submitbtn"><a class="textco" href="valider.php">Je commande</a></button></td>
                </tr>';
            }
        }
        ?>
</tbody>

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