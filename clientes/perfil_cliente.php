<div class="header_nv" align="center">
	<h3>Editar Clientes</h3>
</div>
<div class="cuerpo">
	<?php 
	$cliente=$_REQUEST["cliente"];
	$consultar_datos_cliente="SELECT rfc,nombres,apellido_p,apellido_m,clave_cliente FROM clientes WHERE id_cliente=$cliente";
	$datos_cliente=mysqli_query($con,$consultar_datos_cliente);
	
	if(mysqli_num_rows($datos_cliente)!=0)
	{
		while ($re=mysqli_fetch_array($datos_cliente)) 
		{	
					$clave_cliente=$re["clave_cliente"];
		  			$rfc=$re["rfc"];
		  			$nombre=$re["nombres"];
		  			$app=$re["apellido_p"];
		  			$apm=$re["apellido_m"];
		}
	}
	?>
	<b><header>Clave: <label><?php echo $clave_cliente;?></label></header></b>
	<div class="formulario">

		<br>
		<br>
		
		<b><label>Nombre :</label>
		<input type="text" value="<?php echo $clave_cliente; ?>" id="clave_cliente" hidden>
		<input type="text" onkeypress="return valida_letras(event)" class="clientes"  name="Nombre" value="<?php echo $nombre; ?>" id="nombre_cliente"><br><br>
		<label>Apellido Paterno :</label>
		<input type="text" onkeypress="return valida_letras(event)" class="clientes"  name="Apellido Paterno" value="<?php echo $app; ?>" id="apellido_p_cliente"><br><br>
		<label>Apellido Materno :</label>
		<input type="text" onkeypress="return valida_letras(event)"name="Apellido Materno" value="<?php echo $apm; ?>" id="apellido_m_cliente"><br><br>
			<label>RFC :</label></b>
		<input type="text" onkeypress="return valida_rfc(event)" class="clientes" name="RFC" value="<?php echo $rfc; ?>" id="rfc_cliente" maxlength="16"><br><br>
		
	</div>
</div>
<div class="botones">
	<br>
	<button class="botones_gral" onclick="volver();">Volver</button>
	<button class="botones_gral" onclick="actualizar_cliente();">Editar</button>
</div>

<script type="text/javascript" src="js/clientes.js"></script>
