<div class="clientes">
	<div class="boton_agregar">
		<button id="nueva_venta" onclick="ventana(7)"><i class="fa fa-plus-circle" aria-hidden="true"></i>Nuevo Cliente</button>
	</div>
	<h4>Clientes Registrados</h4>
	<div class="tabla_ventasR">

		<table id="tabla_ventas" align="center">
			<thead id="head_tabla_ventas">
				<th>Clave Cliente</th>
						<th>Nombre</th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th>editar</th>
			</thead>
	  		<tr>
					<?php 
		  	$lista_clientes="SELECT id_cliente,clave_cliente,nombres,apellido_p,apellido_m FROM clientes";
		  	$clientes=mysqli_query($con,$lista_clientes);
		  	if(mysqli_num_rows($clientes)!=0)
			{
		  		while ($re=mysqli_fetch_array($clientes)) 
				{		  				
						$cliente=$re["id_cliente"];
						$clave=$re["clave_cliente"];
						$nombre_completo=$re["nombres"]." ".$re["apellido_p"]." ".$re["apellido_m"];
						
		  			?>
						<th><?php echo $clave; ?></th>
						<th><?php echo $nombre_completo ?></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th><a href="?view=6&cliente=<?php echo $cliente; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></th>
					</tr>
				<?php
				}
		  	}
		  	?>
				
		</table> 
	</div>
</div>
