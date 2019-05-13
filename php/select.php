<?php 
include '../php/connect.php';
$select= mysql_query("SELECT * FROM `LifeFilm`.`film` ORDER BY `id` DESC");

mysql_close($conect);
?>