<div class="container_nv">
		<?php
			$folio="";
			$consultar_Folio="SELECT folio_venta FROM ventas";
			$queryFolio=mysqli_query($con,$consultar_Folio);
			if(mysqli_num_rows($queryFolio)!=0)
			{
					if (mysqli_num_rows($queryFolio)<9) 
					{
						$folio="000".strval(mysqli_num_rows($queryFolio)+1);
					}
					else
						if (mysqli_num_rows($queryFolio)<99) 
						{
							$folio="00".strval(mysqli_num_rows($queryFolio)+1);
						}
						else
							if (mysqli_num_rows($queryFolio)<999)
							{
								$folio="0".strval(mysqli_num_rows($queryFolio)+1);
							}
							else
							{
								$folio=mysqli_num_rows($queryFolio);
							}
			}
				else
				{
					$folio="000".strval(mysqli_num_rows($queryFolio)+1);
				}
	?>
	<div class="header_nv">
				<header><h3 align="center">Registro de ventas</h3></header>
			</div>
			<div class="cuerpo">
				<div class="buscar_cliente">
					<header>Folio Venta: <label id="folio_venta"> <?php echo $folio ?> </label></header>
					
							<div class="ui-widget" align="center">
								
									<label id="lbl_cliente">Cliente </label>
									<input onkeypress="return valida_letras(event)" type="text" id="buscar_cliente"  class="ui-autocomplete-input" value="" placeholder="Buscar Cliente">
									<label >RFC :  </label> <label id="rfc" > </label>
									<input type="hidden" id="id_cliente" value="">
									<input type="hidden" value="" id="clave_na">
								
							</div>
					
					  <hr class="hr_blue">
					
				</div>
				
				<div class="buscar articulo">
						<div class="ui-widget" align="center">
								<label id="lbl_articulo">Articulo</label>
								<input type="text" onkeypress="return valida_letras(event)" id="buscar_articulo" class="ui-autocomplete-input" value="" placeholder="Buscar Articulo">
								<button id="agregar" onclick="CargarTabla();"><i class="fa fa-plus" aria-hidden="true"></i></button>
						</div>
						<br>
					
					<hr class="hr_gray">
					
				</div>
				
		<div class="tabla_nv"  style="overflow-x: auto;max-height: 250px;">
						<table id="tabla_nv">
								<tr id="head_tabla_ventas">
										<th>Descripcion Articulo</th>
										<th>Modelo</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Importe</th>
										<th></th>
								</tr>
						</table> 					
					<hr class="hr_smoke">
			</div>
				
			<div class="costos">
					<label>Enganche:</label>
					<span id="enganche_total">0</span><br><br>
					<label>Bonificacion Enganche:</label>
					<span id="bonificacion_enganche">0</span><br><br>
					<label>Total:</label>
					<span id="total_cuenta">0</span><br> <br>

			</div>

				<div class="abonos" style="overflow-x: auto; overflow-y: auto;" >
							<table>
								<thead align="center" id="head_tabla_ventas">
									<tr align="center"> <b> Abonos Mensuales </b></tr>
									</thead>
									
									<tr id="abono3">
										<td>3 abonos de</td>
										<td id="abonos_mes_3"></td>
										<td id="total_mes_3"></td>
										<td id="ahorro_mes_3"></td>
										<td><input type="radio" name="abonos" class="abonos"value="3" ></td>
									</tr>
									<tr id="abono6">
										<td>6 abonos de</td>
										<td id="abonos_mes_6"></td>
										<td id="total_mes_6"></td>
										<td id="ahorro_mes_6"></td>
										<td><input type="radio" name="abonos" class="abonos" value="6"></td>
									</tr>
									<tr id="abono9">
										<td>9 abonos de</td>
										<td id="abonos_mes_9"></td>
										<td id="total_mes_9"></td>
										<td id="ahorro_mes_9"></td>
										<td><input type="radio" name="abonos" class="abonos" value="9"></td>
									</tr>
									<tr id="abono12">
										<td>12 abonos de</td>
										<td id="abonos_mes_12"></td>
										<td id="total_mes_12"></td>
										<td id="ahorro_mes_12"></td>
										<td><input type="radio" name="abonos" class="abonos" value="12"></td>
									</tr>
						</table> 		
				</div>

		</div>

			<div class="botones">
				<br> <br>
				<button id="cancelar_venta" class="botones_gral" onclick="volver();">Cancelar</button>
				<button id="siguiente_venta" class="botones_gral"onclick="VerificarVenta();">Siguiente</button>
				<button id="guardar_venta"class="botones_gral" onclick="guardar_venta()">Guardar</button>
			</div>

</div>

<script type="text/javascript" src="js/ventas.js"></script>
