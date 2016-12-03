function alta_articulo()
{
	var campo_vacio=[];
		if($.trim($('#descripcion').val()).length&&$.trim($('#modelo').val()).length&&$.trim($('#precio').val()).length&&$.trim($('#existencia').val()).length)
	{
		$.ajax({
				type:"POST",
				url:"actions/alta_articulo.php",
				data:{
					clave_articulo    			:$("#clave_articulo").text(),
					descripcion			 		 :$("#descripcion").val(),
					modelo						  :$("#modelo").val(),
					precio							 :$("#precio").val(),
					existencia					   :$("#existencia").val()
				}
				}).done(function(data){
					if(data==1)
					{
							toastr.options.progressBar = true;
							toastr.options.positionClass = 'toast-top-right';
							toastr.success('Bien Hecho. El Articulo ha sido registrado correctamente');
						setTimeout('document.location.href="index.php?view=3"',2000);
					}
		
				});
	}
	else
	{
		console.log($(".articulos"));
			for(var i=0; i<$(".articulos").length; i++)
			{
			
					if($(".articulos")[i].value=="")
					{
						campo_vacio.push($(".articulos")[i].name);
						$(".articulos")[i].style.background="#ef9090";
					}

			}
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('No es posible continuar, debe ingresar '+campo_vacio +' es campo obligatorio');
	}
}

function actualizar_articulo()
{
	var campo_vacio=[];
		if($.trim($('#descripcion_act').val()).length&&$.trim($('#modelo_act').val()).length&&$.trim($('#precio_act').val()).length&&$.trim($('#existencia_act').val()).length)
	{
		$.ajax({
				type:"POST",
				url:"actions/actualizar_articulo.php",
				data:{
					clave_articulo          :$("#clave_articulo").text(),
					descripcion			     :$("#descripcion_act").val(),
					modelo			 		  :$("#modelo_act").val(),
					precio						:$("#precio_act").val(),
					existencia				  :$("#existencia_act").val()
				}
				}).done(function(data){
					if(data==1)
					{
							toastr.options.progressBar = true;
							toastr.options.positionClass = 'toast-top-right';
							toastr.success('Bien Hecho. El Articulo ha sido actualizado correctamente');
						setTimeout('document.location.href="index.php?view=3"',2000);
					}
		
				});
	}
		else
	{
		console.log($(".articulos"));
			for(var i=0; i<$(".articulos").length; i++)
			{
			
					if($(".articulos")[i].value=="")
					{
						campo_vacio.push($(".articulos")[i].name);
						$(".articulos")[i].style.background="#ef9090";
					}

			}
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('No es posible continuar, debe ingresar '+campo_vacio +' es campo obligatorio');
	}
}
function volver()
{
	alertify.confirm('ALTO !', 'Estas seguro que deseas salir de la pantalla actual ?, asegurate de guardar los datos ingresados ', function()
							 { 
								setTimeout('document.location.href="index.php?view=3"',1000);
							}
                				, function(){ }).set({transition:'zoom'});
}

