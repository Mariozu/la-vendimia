<!doctype html>
<?php require("conexion.php");?>
<html lang="es">
<head>
			<meta charset="UTF-8">
			<title>La Vendimia</title>
			<!-- CSS -->
			<link rel="stylesheet" type="text/css" href="css/index.css">
			<link rel="stylesheet" type="text/css" href="css/ventas.css">
			<link rel="stylesheet" type="text/css" href="css/nueva_venta.css">
			<link rel="stylesheet" type="text/css" href="css/articulos.css">
			<link rel="stylesheet" type="text/css" href="css/clientes.css">
			<link rel="stylesheet" type="text/css" href="css/nuevo_cliente.css">

			<!-- JavaScript -->
			
			
			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<!-- Fontawesome Iconos -->
			<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
			<!-- adaptar al navegador -->
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<link type="text/css" rel="stylesheet" href="libraries/toastr/toastr.css?1425466569" />
			<link type="text/css" rel="stylesheet" href="libraries/alertify.css" />
			<link type="text/css" rel="stylesheet" href="libraries/alertify.min.css" />
</head>
	
<body>
			<div class="contenedor">
					<header>La Vendimia</header>
						<div class="menu_inicio">
								<div class="header_fecha">
										<ul class="nav">
											<li><span id="inicio_dropdown" style="cursor:pointer;" onclick="ventana(0);"><b>Inicio</b></span>
													<ul>
														
															<li><a href="#" onclick="ventana(1);">Ventas</a></li>

															<li><a href="#"onclick="ventana(2);">Clientes</a></li>
															<li><a href="#"onclick="ventana(3);">Articulos</a></li>
															<li><a href="#"onclick="ventana(4);">Configuracion</a></li>
													</ul>
											</li>
										</ul>	
									<div class="tiempo" id="tiempo">

											<?php 
													date_default_timezone_set('UTC');
														$fecha_actual=date("d-m-Y"); 
														echo " Fecha : ".$fecha_actual; 
											?>

								</div>		
					</div>
			</div>
					<div class="center_container">
							<!-- <div class="lateral"></div> -->
						
									<div class="contenido">
								<?php
										if(isset($_REQUEST["view"]))
										{
												switch ($_REQUEST["view"]) 
												{
													case '1': require("ventas/ventas.php"); break;
													case '2': require("clientes/clientes.php"); break;
													case '3': require("articulos/articulos.php"); break;
													case '4': require("configuracion/configuraciones.php"); break;
													case '5': require("ventas/nueva_venta.php");break;
													case '6': require("clientes/perfil_cliente.php");break;
													case '7': require("clientes/nuevo_cliente.php");break;
													case '8': require("articulos/editar_articulo.php");break;
													case '9': require("articulos/nuevo_articulo.php");break;					
													default:break;
												}
										}
										else
										{
								?>
										<h1 align="center"> La vendimia </h1>
										<?php }?>
							</div>
					</div>
			</div>
</body>
</html>
<script type="text/javascript" src="js/redirecciones.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script src="js/libs/toastr/toastr.js"></script>
<script src="js/libs/alertify.js"></script>
<script src="js/libs/alertify.min.js"></script>
