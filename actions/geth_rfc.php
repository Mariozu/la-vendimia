<?php 
$clientes = $_POST['cliente'];
$clave=explode("-", $clientes);
require "../conexion.php";
		$consultar_rfc = "SELECT rfc,id_cliente FROM clientes WHERE clave_cliente = '$clave[0]'";
		$rfc_obtenido=mysqli_query($con,$consultar_rfc);
			 while ($fila = mysqli_fetch_array($rfc_obtenido)) 
			 {
				$respuesta["rfc"] = $fila['rfc'];
				$respuesta["id_cliente"]=$fila["id_cliente"];
			}
		echo json_encode($respuesta);

?>