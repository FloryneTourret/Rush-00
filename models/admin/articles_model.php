<?php

function get_articles($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `articles`");
    return (mysqli_fetch_all($result));
}

function update_titre_article($mysqli, $id, $titre)
{
    mysqli_query($mysqli, "UPDATE `articles` SET `titre` = '$titre' WHERE `id` = $id");
}

function update_desc_article($mysqli, $id, $desc)
{
    mysqli_query($mysqli, "UPDATE `articles` SET `description` = '$desc' WHERE `id` = $id");
}

?>