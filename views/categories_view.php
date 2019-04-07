<div class="articles-content">
    <div class="title-page-categorie col-6 offset-3 text-center">
        <h1>catégories</h1>
    </div>
    <div class="list-categories text-center">
    <?php
        foreach($categories as $row)
        {
            echo '<a class="categorie-lst" href="categories.php?categorie='.$row['0'].'">';
            echo $row['1'];
            echo '</a>';
        }
    ?>
    </div>
    <div class="articles-list offset-2">
        <?php
        if (!empty($articles))
        {
            foreach($articles as $row)
            {
                echo '<div class="col-4 float-left"><div class="article article-'.$row['0'].'">';
                echo '<h2 class="article-title">'.$row['1'].'</h2>';
                echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Emoji_u1f44c.svg/480px-Emoji_u1f44c.svg.png">';
                echo '<p class="article-description">'.$row['2'].'</p>';
                echo '<p class="article-price">'.$row['3'].'€</p>';
                echo '<button onclick="buy('.$row['0'].');">Acheter l\'article</button>';
                echo '</div></div>';
            }
        }
        ?>
        <div class="clearfix"></div>
    </div>
    <script type="text/javascript">
        function buy(id)
        {
            const req = new XMLHttpRequest();
            req.open('GET', 'http://z4r7p3.le-101.fr/acheter.php?id=' + id, true);
            req.send();
            location.reload();
        }
    </script>
</div>