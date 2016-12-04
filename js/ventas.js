$(document).ready(function(){
    $( "#buscar_cliente" ).autocomplete({
		  source: "actions/buscar_clientes.php",
		  minLength: 3
    });
    
   $("#buscar_cliente").focusout(function()
	{
	   console.log($("#buscar_cliente"));
			  $.ajax({
				  url:'actions/geth_rfc.php',
				  type:'POST',
				  dataType:'json',
				  data:{ 
					 		 cliente:$('#buscar_cliente').val()
				  		  }
						  }).done(function(respuesta)
							{
								  $("#rfc").text(respuesta.rfc);
								  $("#id_cliente").val(respuesta.id_cliente);
								  $("#cancelar_venta").show();
								  $("#siguiente_venta").show();
				  					$("#buscar_cliente")[0].style.color="blue";
								  campos=1;
						  });
    });


    $("#buscar_articulo").autocomplete({
      source: "actions/buscar_articulos.php",
      minLength: 3
    }); 
			 $("#buscar_articulo").focusout(function()
			{
				 $("#buscar_articulo")[0].style.color="blue";
			 });
	
});

$(document).ready(function()
{
	
	$("#guardar_venta").hide();
	$(".costos").hide();
	$(".abonos").hide();

});

var datos=[];
var math_o=[];
var contador=0;
var campos=0;
function CargarTabla()
{
	if($.trim($("#buscar_articulo").val()).length)
	{
		

		/*var folio=$("#buscar_articulo").val().split("-");
		console.log(folio[0]);
		console.log($("#cantidadArtc-"+parseInt(folio[0]).val());*/
				$.ajax({
					type:"POST",
					url:"actions/verificar_articulo.php",
					data:{
						art: $("#buscar_articulo").val()
					}
				}).done(function(response)
				{
						if (response!= "error") 
						{

										var articulo = JSON.parse(response);								
										datos.push(articulo);
										if($("#fila_articulo-"+articulo["clave_articulos"]).html() == undefined)
										{
											console.log(articulo["clave_articulos"]+" "+articulo["existencia"]);

													$("#tabla_nv").append($("<tr>").attr("id","fila_articulo-"+articulo["id"])
																	.append($("<td>").text(articulo["descripcion"]))
																	.append($("<td>").text(articulo["modelo"]))
																	.append($("<td>")
																								.append($("<input>").attr( {type:"text", id:"cantidadArtc-"+articulo["id"],class:"boton_cantidad", value:"1", onkeyup:"CalcularImporte("+articulo['id'].toString()+","+articulo['existencia']+")",onkeypress:"return valida_numeros(event)"}) ) 
																				)
																	.append($("<td class='cantidad' >").attr("id","precio-"+articulo["id"]).text(Math.round(articulo["precio"]*(1+(articulo["tasa_financiamiento"]*articulo["plazo_maximo"]/100)))) )
																	.append($("<td>").attr("id","importe-"+articulo["id"]).text(Math.round(articulo["precio"]*(1+(articulo["tasa_financiamiento"]*articulo["plazo_maximo"]/100)))))
																	.append($("<td class='importe'>")
																		.append($("<span class='fa fa-times' aria-hidden='true'>").attr({id :"eliminar_fila"+"-"+articulo["id"], onclick:'EliminarFila('+articulo["id"]+')'}))
																	)
																);

													enganche=(articulo["enganche"]/100)*parseInt($("#importe-"+articulo["id"]).html());
													enganche_actual=parseInt($("#enganche_total").html())+enganche;
													$("#enganche_total").html(parseInt(enganche_actual).toFixed(2));

													BF_enganche=enganche*((articulo["tasa_financiamiento"]*articulo["plazo_maximo"])/100);
													BF_enganche_actual=parseInt($("#bonificacion_enganche").html())+BF_enganche;
													$("#bonificacion_enganche").html(parseInt(BF_enganche_actual).toFixed(2));

													adeudo_total=parseInt($("#precio-"+articulo["id"]).html())-parseInt(enganche)-parseInt(BF_enganche);
													adeudo_total_actual=parseInt($("#total_cuenta").html())+adeudo_total;
													$("#total_cuenta").html(parseInt(adeudo_total_actual).toFixed(2));

													$(".costos").show();
													math_o[articulo["id"]]=enganche+"//"+BF_enganche+"//"+adeudo_total;
													contador++;
											}
													else
													{
														toastr.options.progressBar = true;
														toastr.options.positionClass = 'toast-top-right';
														toastr.error('este articulo ya ha sido agregado');
													}

									}


					 else
							{
								toastr.options.progressBar = true;
								toastr.options.positionClass = 'toast-top-right';
								toastr.error('el articulo no cuenta con existencia');
							}
				});
		
		}
			else
				{
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('Debes de ingresar un articulo par continuar');
				}
}

function EliminarFila(id)
{
	console.log(id);

	quitar=math_o[id].split("//")

	enganche_actual=parseInt($("#enganche_total").html())-parseInt(quitar[0]);
	$("#enganche_total").html(parseInt(enganche_actual).toFixed(2));

	BF_enganche_actual=parseInt($("#bonificacion_enganche").html())-parseInt(quitar[1]);
	$("#bonificacion_enganche").html(BF_enganche_actual);

	adeudo_total_actual=parseInt($("#total_cuenta").html())-parseInt(quitar[2]);
	$("#total_cuenta").html(adeudo_total_actual);

	$("#fila_articulo-"+id).remove();

	contador--;

	if (contador==0) 
	{
		$(".costos").hide();
	}
}

function calc_enganche(precio_e)
{
	console.log("entro a enganche "+precio_e);
					enganche=(datos[0]["enganche"]/100)*importe;
					enganche_actual=parseInt($("#enganche_total").html()).toFixed(2)+enganche-parseInt(precio_e);
					$("#enganche_total").html(parseInt(enganche_actual).toFixed(2));
				console.log(enganche_actual);  
}
function calc_bonificacion(precio_be)
{
	
					BF_enganche=enganche*((datos[0]["tasa_financiamiento"]*datos[0]["plazo_maximo"])/100);
				console.log(BF_enganche);
					BF_enganche_actual=parseInt($("#bonificacion_enganche").html()).toFixed(2)+BF_enganche - parseInt(precio_be);
				console.log(BF_enganche_actual);
					$("#bonificacion_enganche").html(Math.round(BF_enganche_actual));
	
}
function calc_total(precio)
{
	adeudo_total=importe-parseInt(enganche)-parseInt(BF_enganche);
					adeudo_total_actual=parseInt($("#total_cuenta").html()).toFixed(2)+adeudo_total-parseInt(precio);
					$("#total_cuenta").html(adeudo_total_actual);
}

function CalcularImporte(id,existencia)
{
	console.log(id);
	console.log($("#cantidadArtc-"+id).val());
	var cantidad = $("#cantidadArtc-"+id).val();
	var precio=$("#precio-"+id).html();
	console.log($("#precio-"+id).html())
	var importe="0";
	if (cantidad != "") 
		{
			if (existencia>=cantidad) 
			{
					importe=cantidad*precio;

					quitar=math_o[id].split("//")

					calc_enganche(quitar[0]);
					calc_bonificacion(quitar[1])
					calc_total(quitar[2]);
					math_o[id]=enganche+"//"+BF_enganche+"//"+adeudo_total;
					//console.log(importe)

			}
				else
				{


								toastr.options.progressBar = true;
								toastr.options.positionClass = 'toast-top-right';
								toastr.error('Haz excedido la existencia maxima de '+existencia);
				
							
							importe=existencia*precio;
							$("#cantidadArtc-"+id).val(existencia);

							quitar=math_o[id].split("//")

							calc_enganche(quitar[0]);
							calc_bonificacion(quitar[1])
							calc_total(quitar[2]);

							math_o[id]=enganche+"//"+BF_enganche+"//"+adeudo_total;

				}	
	}

	$("#importe-"+id).html(importe);
}

function LimpiarCampo(id)
{
	$("#"+id).val("");
	if(id=="buscar_cliente")
	{
		$("#rfc").val("");
		campos=0;
		$("#cancelar_venta").hide();
		$("#siguiente_venta").hide();
	}
}

function VerificarVenta()
{ // verficia que los campos esten completos para poder mostrar el panel de abonos mensuales seguido de esto se aplican dichas formulas correspondientes en el caso de ahorro si el ahorro es negativo se muestra como 0
		if($.trim($('#buscar_cliente').val()).length &&$.trim($('#buscar_articulo').val()).length)
	{
				$(".abonos").fadeIn("slow");
			if(contador>0 && campos >0 && parseInt($("#total_cuenta").html())!=0)
			{

				precio_contado=parseInt($("#total_cuenta").html())/(1+(datos[0]["tasa_financiamiento"]*datos[0]["plazo_maximo"])/100);

				Pago=precio_contado*(1+(datos[0]["tasa_financiamiento"]*3)/100);
				$("#total_mes_3").html("TOTAL A PAGAR $"+parseInt(Pago).toFixed(2));
				
		
				abono_mes=Pago/3;
				$("#abonos_mes_3").html("$"+parseFloat(abono_mes).toFixed(2));
				ahorro=parseInt($("#total_cuenta").html())-Pago;
				if (parseInt(ahorro)>=0){$("#ahorro_mes_3").html("SE AHORRA $"+parseInt(ahorro).toFixed(2));} else $("#ahorro_mes_3").html("SE AHORRA $0");

				Pago=precio_contado*(1+(datos[0]["tasa_financiamiento"]*6)/100);
				$("#total_mes_6").html("TOTAL A PAGAR $"+parseInt(Pago).toFixed(2));
				abono_mes=Pago/6;
				$("#abonos_mes_6").html("$"+parseInt(abono_mes).toFixed(2));
				ahorro=parseInt($("#total_cuenta").html())-Pago;
				if (parseInt(ahorro)>=0){$("#ahorro_mes_6").html("SE AHORRA $"+parseInt(ahorro).toFixed(2));} else $("#ahorro_mes_6").html("SE AHORRA $0");

				Pago=precio_contado*(1+(datos[0]["tasa_financiamiento"]*9)/100);
				$("#total_mes_9").html("TOTAL A PAGAR $"+parseInt(Pago).toFixed(2));
				abono_mes=Pago/9;
				$("#abonos_mes_9").html("$"+parseInt(abono_mes).toFixed(2));
				ahorro=parseInt($("#total_cuenta").html())-Pago;
				if (parseInt(ahorro)>=0){$("#ahorro_mes_9").html("SE AHORRA $"+parseInt(ahorro).toFixed(2));} else $("#ahorro_mes_9").html("SE AHORRA $0");

				Pago=precio_contado*(1+(datos[0]["tasa_financiamiento"]*12)/100);
				$("#total_mes_12").html("TOTAL A PAGAR $"+parseInt(Pago).toFixed(2));
				abono_mes=Pago/12;
				$("#abonos_mes_12").html("$"+parseInt(abono_mes).toFixed(2));
				ahorro=parseInt($("#total_cuenta").html())-Pago;
				if (parseInt(ahorro)>=0){$("#ahorro_mes_12").html("SE AHORRA $"+parseInt(ahorro).toFixed(2));} else $("#ahorro_mes_12").html("SE AHORRA $0");

				switch(datos[0]["plazo_maximo"]){
					case 3:
					$("#abono6").remove();
					$("#abono9").remove();
					$("#abono12").remove();
					break;
					case 6:
					$("#abono9").remove();
					$("#abono12").remove();
					break;
					case 9:
					$("#abono12").remove();
					break;
				}
				$("#siguiente_venta").hide();
				$("#guardar_venta").show();
				$(".abonos").show();

			}
			else
			{
				toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('Debe seleccionar todos los datos correctamente');
			}
	}

}
function guardar_venta()
{
	if ($('.abonos').is(':checked')) 
	{
		$.ajax({
				type:"POST",
				url:"actions/guardar_venta.php",
				data:{
					folio_c: $("#buscar_cliente").val(),
					total: $("#total_cuenta").html(),
					folio_v: $("#folio_venta").text(),
					fecha:$("#tiempo").text()

				}
			}).done(function(data){
						if(data==1)
						{
								toastr.options.progressBar = true;
								toastr.options.positionClass = 'toast-top-right';
								toastr.success('Bien Hecho, Tu venta ha sido registrada correctamente');
							setTimeout('document.location.href="index.php?view=1"',4000);
						}

					});
	}
		else
		{
					toastr.options.progressBar = true;
					toastr.options.positionClass = 'toast-top-right';
					toastr.error('Debe seleccionar un plazo para realizar el pago de su compra');

		}
}
function volver()
{
	alertify.confirm('ALTO !', 'Estas seguro que deseas salir de la pantalla actual ?, asegurate de guardar los datos ingresados ', function()
							 { 
								setTimeout('document.location.href="index.php?view=1"',1000);
							}
                				, function(){ }).set({transition:'zoom'});;
}
