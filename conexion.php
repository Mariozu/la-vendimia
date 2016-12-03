<?php
	require_once("conect/config.php");
	$con=mysqli_connect($servidor,$usuario,$pass,$bd) or die("No se pudo conectar a la base de datos "); 
	mysqli_set_charset($con,"utf8");
?>