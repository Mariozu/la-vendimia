<div class="header_nv" align="center">
	<h3>Registro de Articulos</h3>
</div>
<div class="cuerpo">
	<?php 
			$clave="";
			$consultar_clave="SELECT clave_articulos FROM articulos";
			$resultado_clave=mysqli_query($con,$consultar_clave);
			if(mysqli_num_rows($resultado_clave)!=0)
			{
				if (mysqli_num_rows($resultado_clave)<9) 
				{
					$clave="000".strval(mysqli_num_rows($resultado_clave)+1);
				}
				else
					if (mysqli_num_rows($resultado_clave)<99) 
					{
						$clave="00".strval(mysqli_num_rows($resultado_clave)+1);

					}
						else
						if (mysqli_num_rows($resultado_clave)<999) 
						{
							$clave="0".strval(mysqli_num_rows($resultado_clave)+1);
						}
							else
							{
								$clave=mysqli_num_rows($resultado_clave);
							}
			}
	else
			{
				$clave="000".strval(mysqli_num_rows($resultado_clave)+1);
			}
	?>
	<b><header>Clave: <label id="clave_articulo"><?php  echo $clave; ?></label> </header>
	<div class="formulario">
		<label>Descripcion: </label>
		<input type="text"   id="descripcion" class="articulos" name="descripcion" onkeypress="return valida_letras(event)"><br><br>
		<label>Modelo: </label>
		<input type="text"   id="modelo" class="articulos" name="modelo" onkeypress="return valida_letras_numeros(event)"><br><br>
		<label>Precio: </label>
		<input type="text"  id="precio"class="articulos" name="precio" onkeypress="return valida_numeros(event)"><br><br>
			<label>Existencia: </label></b>
		<input type="text" value="" id="existencia" class="articulos" name="existencia" onkeypress="return valida_numeros(event)"><br><br>
		
	</div>
	
</div>
<div class="botones">
	<br>
	<button class="botones_gral" onclick="volver();">Cancelar</button>
	<button  class="botones_gral"  onclick="alta_articulo();">Guardar</button>
</div>

<script type="text/javascript" src="js/articulos.js"></script>