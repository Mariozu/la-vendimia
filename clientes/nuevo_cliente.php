<div class="header_nv" align="center">
	<h3>Registro de Clientes</h3>
</div>
<div class="cuerpo">
	<?php 
			$clave="";
			$consultar_clave="SELECT clave_cliente FROM clientes";
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
	
	<b><header>Clave: <label id="clave_cliente" ><?php echo $clave;?></label></header></b>
	
<div class="formulario">
		
				<div >
					<b> <label>Nombre: </label> 
					<input type="text"  value="" id="nombre_cliente" class="clientes" name="Nombre" onkeypress="return valida_letras(event)"><br><br>
				</div>
				<div>
					<label>Apellido Paterno: </label>
					<input type="text"value="" id="apellido_pat"  class="clientes"  name="Apellido Paterno" onkeypress="return valida_letras(event)"><br><br>
				</div>
				<div >
					<label>Apellido Materno: </label>
					<input type="text"   value="" id="apellido_mat"   name="Apellido Materno" onkeypress="return valida_letras(event)"><br><br>
					</div>
				<div >
					<label>RFC: </label></b>
					<input type="text" value="" id="rfc" class="clientes"   name="RFC" onkeypress="return valida_rfc(event)" maxlength="16"><br><br>
				</div>

	</div>
	
</div>

<div class="botones"><br>
	
	<button class="botones_gral" onclick="volver();">Cancelar</button>
	<button class="botones_gral"  onclick="alta_cliente();">Guardar</button>
	
</div>

<script type="text/javascript" src="js/clientes.js"></script>
