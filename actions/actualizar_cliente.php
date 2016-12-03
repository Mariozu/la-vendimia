<?php 
require('../conexion.php');
$nombre=$_POST["nombre"];
$apellido_p=$_POST["apellido_pat"];
$apellido_m=$_POST["apellido_mat"];
$rfc=$_POST["rfc"];
	
	$update_cliente="UPDATE clientes set nombres='".$nombre."',apellido_p='".$apellido_p."',apellido_m='".$apellido_m."',rfc='".$rfc."' WHERE clave_cliente='".$_POST['clave_cliente']."'";
	$result_update_cliente=mysqli_query($con,$update_cliente)or die(mysqli_error($con));
		echo 1;
?>