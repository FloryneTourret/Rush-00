<?php

$db = new mysqli('172.18.0.2', 'root', 'root');
mysqli_query($db, file_get_contents('database.sql'));

$mysqli = new mysqli('172.18.0.2', 'root', 'root', 'ft_minishop');
mysqli_multi_query($mysqli, file_get_contents('content.sql'));

?>