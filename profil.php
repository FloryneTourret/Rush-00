<?php
session_start();

if (!isset($_SESSION['email']))
    header('Location: ../index.php');

include('configs/database.php');
include('models/profil_model.php');

include('views/base/header.php');
include('views/profil_view.php');

include('views/base/footer.php');
?>