<?php 
require '../conexion.php';
$clave_articulo=$_POST["clave_articulo"];
$descripcion=$_POST["descripcion"];
$modelo=$_POST["modelo"];
$precio=$_POST["precio"];
$existencia=$_POST["existencia"];

$alta_articulo="INSERT INTO articulos(clave_articulos,descripcion,modelo,precio,existencia) values('".$clave_articulo."','".$descripcion."','".$modelo."','".$precio."','".$existencia."')";
 mysqli_query($con,$alta_articulo)or die(mysqli_error($con));
				echo '1';
?>