<?php
	require "../conexion.php";

    $buscar = $_GET['term'];
    
    $buscar_cliente ="SELECT * FROM clientes WHERE nombres LIKE '%".$buscar."%' OR apellido_p LIKE '%".$buscar."%' OR apellido_m LIKE '%".$buscar."%'  ORDER BY id_cliente ASC";
	$resultado_busqueda=mysqli_query($con,$buscar_cliente);
			while ($row =  mysqli_fetch_array($resultado_busqueda)) 
			{
				$data[]=$row['clave_cliente']."-".$row['nombres']." ".$row['apellido_p']." ".$row['apellido_m'];        
			}
    
    //return json data
    echo json_encode($data);

?>