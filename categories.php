<?php
session_start();

include('configs/database.php');
include('models/categories_model.php');

include('views/base/header.php');
$articles = get_articles($mysqli);
$categories = get_categories($mysqli);
include('views/categories_view.php');

include('views/base/footer.php');
?>