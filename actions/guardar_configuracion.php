<?php 
	require '../conexion.php';
	$taza=$_POST["tasa"];
	$enganche=$_POST["enganche"];
	$plazo=$_POST["plazo"];
	$control =$_POST["control"];
if ($control==0)
{

	$guardar_configuracion="INSERT INTO configuracion(tasa_financiamiento,enganche,plazo_maximo) values('".$taza."','".$enganche."','".$plazo."')";
	 mysqli_query($con,$guardar_configuracion)or die(mysqli_error($con));
					echo '1';

}
else 
{
		$update_config="UPDATE configuracion set tasa_financiamiento='".$taza."',enganche='".$enganche."',plazo_maximo='".$plazo."'";
			 mysqli_query($con,$update_config)or die(mysqli_error($con));
			echo '1';
}
?>