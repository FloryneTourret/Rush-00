<?php
session_start();

if ($_SESSION['role'] != 'admin')
    header('Location: ../index.php');

include('../configs/database.php');
include('../models/admin/ajout_model.php');
include('../models/admin/categories_model.php');

include('../views/base/header_admin.php');
$categories = get_categories($mysqli);
include('../views/admin/ajout_view.php');

if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['prix']))
{
    $titre = ucfirst(htmlspecialchars(addslashes($_POST['titre'])));
    $description = htmlspecialchars(addslashes($_POST['description']));
    $prix = strtolower(htmlspecialchars(addslashes($_POST['prix'])));
    if (is_numeric($prix))
    {
        $id_article = ajout_article($mysqli, $titre, $description, $prix);
        if(isset($_POST['categories']))
        {
            ajout_article_categorie($mysqli, $id_article, $_POST['categories']);
        }
        header('Location: index.php');
    }
    else
        echo '<div class="text-center"><p>Entrez un nombre pour le prix.</p></div>';
}


include('../views/base/footer_admin.php');
?>