<?php

function get_articles($mysqli)
{
    $result = mysqli_query($mysqli, "SELECT * FROM `articles`");
    return (mysqli_fetch_all($result));
}

?>