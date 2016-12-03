<?php
	require "../conexion.php";

    $letter = $_GET['term'];
		$buscar_articulo ="SELECT * FROM articulos WHERE descripcion LIKE '%".$letter."%' ORDER BY clave_articulos ASC";
		$articulo_obtenido=mysqli_query($con,$buscar_articulo);
			while ($row = mysqli_fetch_array($articulo_obtenido)) 
			{
				$data[]=$row['clave_articulos']."-".$row['descripcion'];  
			}

    echo json_encode($data);

?>