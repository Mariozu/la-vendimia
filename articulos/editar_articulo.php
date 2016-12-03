<div class="header_nv" align="center">
    <h3 align="center">Editar articulo</h3>
</div>
<div class="cuerpo">
 	<?php 
	$articulo=$_REQUEST["articulo"];
	$consultar_datos_articulo="SELECT descripcion,modelo,precio,existencia FROM articulos WHERE clave_articulos=$articulo";
	$datos_articulo=mysqli_query($con,$consultar_datos_articulo);
	
	if(mysqli_num_rows($datos_articulo)!=0)
	{
		while ($re=mysqli_fetch_array($datos_articulo)) 
		{	
					
		  			$descripcion=$re["descripcion"];
		  			$modelo=$re["modelo"];
		  			$precio=$re["precio"];
		  			$existencia=$re["existencia"];
		}
	}
	?>
    	<b> <header >Clave: <label id="clave_articulo"><?php echo $articulo;?></label></header>
		<div class="formulario">

			<br>
			<br>

				<label>Descripcion: </label>
				<input type="text" value="<?php echo $descripcion ?>" class="articulos" name="Descripcion"   onkeypress="return valida_letras(event)"  id="descripcion_act"><br><br>
				<label>Modelo: </label>
				<input type="text" value="<?php echo $modelo ?>"  class="articulos" name="Modelo"  onkeypress="return valida_letras_numeros(event)"  id="modelo_act"><br><br>
				<label>Precio</label> 
				<input type="text" value="<?php echo $precio ?>" class="articulos" name="Precio"  onkeypress="return valida_numeros(event)"  id="precio_act"><br><br>
			<label>Existencia</label></b>
				<input type="text" value="<?php echo $existencia ?>" class="articulos" name="Existencia"  onkeypress="return valida_numeros(event)" id="existencia_act"><br><br>

		</div>
</div>
<div class="botones">
	<br>
    <button class="botones_gral" onclick="volver();">Volver</button>
    <button class="botones_gral" onclick="actualizar_articulo();">Editar</button>
</div>

<script type="text/javascript" src="js/articulos.js"></script>
