<?php 
require('../conexion.php');
$descripcion=$_POST["descripcion"];
$modelo=$_POST["modelo"];
$precio=$_POST["precio"];
$existencia=$_POST["existencia"];
	
	$update_articulos="UPDATE articulos set descripcion='".$descripcion."',modelo='".$modelo."',precio='".$precio."',existencia='".$existencia."' WHERE clave_articulos='".$_POST['clave_articulo']."'";
	$result_update_articulo=mysqli_query($con,$update_articulos)or die(mysqli_error($con));
		echo 1;
?>