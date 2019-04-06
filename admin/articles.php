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

// if(isset($_POST['categorie']))
// {
//     $categorie = ucfirst(htmlspecialchars(addslashes($_POST['categorie'])));
//     ajout_categorie($mysqli, $categorie);
//     header('Location: articles.php');
// }
// if(isset($_GET['del']))
// {
//     if(is_numeric($_GET['del']))
//     {
//         $id = $_GET['del'];
//         suppression_categorie($mysqli, $id);
//     }
// }
// if(isset($_GET['update']) && isset($_GET['content']))
// {
//     if(is_numeric($_GET['update']))
//     {
//         $id = $_GET['update'];
//         $categorie = ucfirst(htmlspecialchars(addslashes($_GET['content'])));
//         update_categorie($mysqli, $id, $categorie);
//     }
// }

include('../views/base/footer_admin.php');
?>