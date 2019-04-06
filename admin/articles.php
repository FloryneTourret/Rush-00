<?php
session_start();
header('Access-Control-Allow-Origin: *');

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
include('../models/admin/articles_model.php');

include('../views/base/header_admin.php');
$articles = get_articles($mysqli);
include('../views/admin/articles_view.php');

if(isset($_GET['del']))
{
    if(is_numeric($_GET['del']))
    {
        $id = $_GET['del'];
        suppression_article($mysqli, $id);
    }
}
if(isset($_GET['update']))
{
    if(isset($_GET['desc']))
    {
        if(is_numeric($_GET['update']))
        {
            $id = $_GET['update'];
            $desc = ucfirst(htmlspecialchars(addslashes($_GET['desc'])));
            update_desc_article($mysqli, $id, $desc);
        }
    }
    if(isset($_GET['titre']))
    {
        if(is_numeric($_GET['update']))
        {
            $id = $_GET['update'];
            $titre = ucfirst(htmlspecialchars(addslashes($_GET['titre'])));
            update_titre_article($mysqli, $id, $titre);
        }
    }
    if(isset($_GET['prix']))
    {
        if(is_numeric($_GET['update']) && is_numeric($_GET['prix']))
        {
            $id = $_GET['update'];
            $prix = $_GET['prix'];
            update_prix_article($mysqli, $id, $prix);
        }
    }
}

include('../views/base/footer_admin.php');
?>