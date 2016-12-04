
function valida_numeros(event)
{
	var keyCode = event.which;
  if (!(keyCode >= 48 && keyCode <= 57) && keyCode != 8 && keyCode != 190 && keyCode != 9) {
        event.preventDefault();

        return;
}
}
function valida_clave(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==9 )
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
	if (tecla==8 || tecla==9 )
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
	if (tecla==8 || tecla==9 )
	{
		return true;
	}
	patron =/^[\s\.#0-9a-zA-Z ñ\s]$/;
	
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
	
}
function valida_letras(event)
{
	var keyCode = event.which;
	 if (!(keyCode >= 65 && keyCode <= 90) && !(keyCode >= 97 && keyCode <= 122) &&  keyCode != 8 && keyCode != 32 && keyCode != 9) {
        event.preventDefault();

        return;
}
}
function valida_letras_numeros(e)
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==9 )
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
	if (tecla==8 || tecla==9 )
	{
		return true;
	}
	patron =/^[-0-9]$/;
	//^\*[\*\0-9a-z]\*+$
	//[\*\0-9\a-z]
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
}



function convierte(field)
{
	field.value = field.value.toUpperCase();
}