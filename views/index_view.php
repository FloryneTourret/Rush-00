<div class="articles-content col-12">

    <div class="col-6 offset-3 text-center">
        <h1>ft_minishop</h1>
    </div>

    <div class="articles-list offset-2">
        <?php 
            foreach($articles as $row)
            {
                echo '<div class="col-4 article float-left article-'.$row['0'].'">';
                echo '<h2 class="article-title">'.$row['1'].'</h2>';
                echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Emoji_u1f44c.svg/480px-Emoji_u1f44c.svg.png">';
                echo '<p class="article-description">'.$row['2'].'</p>';
                echo '<p class="article-price">'.$row['3'].'€</p>';
                echo '<a href="../acheter.php?id='.$row['0'].'">Acheter l\'article</a>';
                echo '</div>';
            }

        ?>
        <div class="clearfix"></div>
    </div>
</div>