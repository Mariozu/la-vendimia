function valida_numeros(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	
	//Tecla de retroceso para borrar, siempre la permite
	if (tecla==8 )
	{
		return true;
	}
	
	// Patron de entrada, en este caso solo acepta numeros
	patron =/[.0-9]/;
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
}
function valida_clave(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 )
	{
		return true;
	}
	patron =/^[.0-9a-zA-Z.]$/;
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
}
function valida_rfc(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 )
	{
		return true;
	}
	patron =/^[-0-9a-zA-Z]$/;
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
	
}
function valida_calle_numero(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 )
	{
		return true;
	}
	patron =/^[\s\.#0-9a-zA-Z ñ\s]$/;
	
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
	
}
function valida_letras(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 )
	{
		return true;
	}
	patron =/^[\sa-zA-Z ñ\s]$/;
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
	
}
function valida_letras_numeros(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 )
	{
		return true;
	}

	patron =/^[\s0-9a-zA-Z\s]$/;
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
}
function valida_poliza(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 )
	{
		return true;
	}
	patron =/^[-0-9]$/;
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
}
function tabulacion(e) { 
	
	
	var keyCode = e.keyCode || e.which; 
	if (keyCode == 9) 
	{
		console.log(e.preventDefault);
		e.preventDefault(); 
		// call custom function here
	} 
}
function convierte(field)
{
	field.value = field.value.toUpperCase();
}