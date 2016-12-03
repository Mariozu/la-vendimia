<?php 
require('../conexion.php');
$folio_c=$_POST["folio_c"];
$total=$_POST["total"];
$folio_v=$_POST["folio_v"];
$fecha=date("d-m-Y");
$fecha_xpld=explode("-",$fecha);
$fecha_actual=$fecha_xpld[2]."/".$fecha_xpld[1]."/".$fecha_xpld[0];
$folio_cliente=explode("-",$folio_c);
	$numero_cliente=$folio_cliente[0];
$cliente=$folio_cliente[1];

	$venta="INSERT INTO ventas(folio_venta,cliente,fecha,total,folio_cliente) values('".$folio_v."','".$cliente."','".$fecha_actual."','".$total."','".$numero_cliente."')";
 mysqli_query($con,$venta)or die(mysqli_error($con));
				echo '1';
?>