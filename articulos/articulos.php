<div class="clientes">
	<div class="boton_agregar">
		<button id="agregar_articulo" onclick="ventana(9)"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Articulo</button>
	</div>
	<h4>Articulos Registrados</h4>
	<div class="tabla_ventasR">

		<table id="tabla_ventas" >
	  		<thead id="head_tabla_ventas">
			    <th>Clave Articulo</th>
			    <th>Descripcion</th>
			    <th></th>
			    <th></th>
			    <th></th>
			    <th></th>
			    <th></th>
			    <th>Editar</th>
		  	</thead>
		  		<?php 
		  	$lista_articulos="SELECT clave_articulos,descripcion FROM articulos";
		  	$articulos=mysqli_query($con,$lista_articulos);
		  	if(mysqli_num_rows($articulos)!=0)
			{
		  		while ($re=mysqli_fetch_array($articulos)) 
				{		  				
						
						$clave=$re["clave_articulos"];
						$descripcion_articulo=$re["descripcion"];
						
		  			?>
		  			<tr>
		  				<th><?php echo $clave; ?></th>
		  				<th><?php echo $descripcion_articulo; ?> </th>
		  				<th></th>
		  				<th></th>
		  				<th></th>
		  				<th></th>
		  				<th></th>
		  				<th><a href="?view=8&articulo=<?php echo $clave; ?>" ><i class="fa fa-pencil-square" aria-hidden="true"></i></a></th>
		  			</tr>
		<?php
				}
		  	}
		  	?>

		  	
		</table> 
	</div>
</div>
