<?php

function get_articles($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `articles`");
    $articles = mysqli_fetch_all($result);
    if (isset($articles))
            return $articles;
    return FALSE;
}

?>