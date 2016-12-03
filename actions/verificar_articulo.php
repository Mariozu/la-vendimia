<?php 
require "../conexion.php";
$articulo = $_POST['art'];
$clave=explode("-", $articulo);
$consulta = "SELECT * FROM articulos JOIN configuracion WHERE clave_articulos = '".$clave[0]."' AND existencia > 0 AND idconfiguracion = 0 ";
$rescon=mysqli_query($con,$consulta);
if (mysqli_num_rows($rescon)!=0) {
	
	$fila = mysqli_fetch_assoc($rescon);
	   
	echo json_encode($fila); 
}else{
	
	return "error";

}
?> 