<?php

function ajout_categorie($mysqli, $categorie)
{
    mysqli_query($mysqli, "INSERT INTO `categories` (`categorie`) VALUES ('$categorie')");
}

?>