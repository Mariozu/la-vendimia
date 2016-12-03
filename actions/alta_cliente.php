<?php 
require '../conexion.php';
$clave_cliente=$_POST["clave_cliente"];
$nombre_cliente=$_POST["nombre"];
$apellido_p=$_POST["apellido_pat"];
$apellido_m=$_POST["apellido_mat"];
$rfc=$_POST["rfc"];

$alta_cliente="INSERT INTO clientes(clave_cliente,nombres,apellido_p,apellido_m,rfc) values('".$clave_cliente."','".$nombre_cliente."','".$apellido_p."','".$apellido_m."','".$rfc."')";
 mysqli_query($con,$alta_cliente)or die(mysqli_error($con));
				echo '1';
?>