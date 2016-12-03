function alta_cliente()
{
	var campo_vacio =[];
	console.log($("#clave_cliente").text());
		if($.trim($('#nombre_cliente').val()).length &&$.trim($('#apellido_pat').val()).length&&$.trim($('#rfc').val()).length)
	{
	$.ajax({
				type:"POST",
				url:"actions/alta_cliente.php",
				data:{
					clave_cliente    :$("#clave_cliente").text(),
					nombre			  :$("#nombre_cliente").val(),
					apellido_pat	 :$("#apellido_pat").val(),
					apellido_mat	:$("#apellido_mat").val(),
					rfc					   :$("#rfc").val()
				}
				}).done(function(data){
					if(data==1)
					{
							toastr.options.progressBar = true;
							toastr.options.positionClass = 'toast-top-right';
							toastr.success('Bien Hecho. El cliente ha sido registrado correctamente');
						setTimeout('document.location.href="index.php?view=2"',2000);
					}
		
				});
	}
	else
	{
		console.log($(".clientes"));
	for(var i=0; i<$(".clientes").length; i++)
	{
		console.log($(".clientes")[i].value);
		if($(".clientes")[i].value=="")
		{
			campo_vacio.push($(".clientes")[i].name);
		}
		
	}
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('No es posible continuar, debe ingresar '+campo_vacio +' es campo obligatorio');
	}
}

function actualizar_cliente()
{
	var campo_vacio =[];
		if($.trim($('#nombre_cliente').val()).length &&$.trim($('#apellido_p_cliente').val()).length&&$.trim($('#rfc_cliente').val()).length)
	{
		$.ajax({
				type:"POST",
				url:"actions/actualizar_cliente.php",
				data:{
					clave_cliente    :$("#clave_cliente").val(),
					nombre			  :$("#nombre_cliente").val(),
					apellido_pat	 :$("#apellido_p_cliente").val(),
					apellido_mat	:$("#apellido_m_cliente").val(),
					rfc					   :$("#rfc_cliente").val()
				}
				}).done(function(data){
					if(data==1)
					{
							toastr.options.progressBar = true;
							toastr.options.positionClass = 'toast-top-right';
							toastr.success('Bien Hecho. El cliente ha sido actualizado correctamente');
							setTimeout('document.location.href="index.php?view=2"',2000);
					}
		
				});
	}
		else
		{
				console.log($(".clientes"));
			for(var i=0; i<$(".clientes").length; i++)
			{
				console.log($(".clientes")[i].value);
				if($(".clientes")[i].value=="")
				{
					campo_vacio.push($(".clientes")[i].name);
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
								setTimeout('document.location.href="index.php?view=2"',1000);
							}
                				, function(){ }).set({transition:'zoom'});;
}