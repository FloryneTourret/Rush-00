<div class="articles-content col-12">
    <div class="col-6 offset-3 text-center">
        <h1>catégories</h1>
    </div>
    <div class="list-categories">
    <?php
    var_dump($categories);
        foreach($categories as $row)
        {
            echo $row['0'];
        }
    ?>
    </div>
    <div class="articles-list offset-2">
        <?php 
            foreach($articles as $row)
            {
                echo '<div class="col-4 float-left"><div class="article article-'.$row['0'].'">';
                echo '<h2 class="article-title">'.$row['1'].'</h2>';
                echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Emoji_u1f44c.svg/480px-Emoji_u1f44c.svg.png">';
                echo '<p class="article-description">'.$row['2'].'</p>';
                echo '<p class="article-price">'.$row['3'].'€</p>';
                echo '<a href="../acheter.php?id='.$row['0'].'">Acheter l\'article</a>';
                echo '</div></div>';
            }

        ?>
        <div class="clearfix"></div>
    </div>
</div>