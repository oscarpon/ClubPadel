////////////////////////////////////
///////Funciones Genericas/////////
//////////////////////////////////

//Comprobar si un campo esta vacio.
function comprobarVacio(campo){
	if(campo.value == null || campo.value.length == 0 || campo.value == ""){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		campo.style.backgroundColor = "ffffff";
		campo.style.borderColor = "#00ff66";
		return true;
	}
}

//Comprobar que solo se introducen caracteres alfabeticos,
//y que no supere el tamaño indicado.
function comprobarAlfabetico(campo, size){

	//Expresion regular para comprobar que solo se introducen caracteres alfabeticos.
	var expresion_reg_alf=/(([A-Za-záéíóúñ]+)(\s)?([A-Za-záéíóúñ]+)?)/;

	//Comprueba que en el campo solo se introducen caracteres alfabeticos.
	if(!expresion_reg_alf.test(campo.value)){
		
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		//Comprueba el que tamño del campo no supere el maximo indicado.
		if(campo.value.length > size){
			
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprobar que solo se introducen caracteres alfanumericos,
//y que no supere el tamaño indicado.
function comprobarAlfanumerico(campo, size){

	//Expresion regular para comprobar que solo se introducen caracteres alfanumericos.
	var expresion_reg_alfnum=/^[A-Za-záéíóúÁÉÍÓÚñÑ0-9]+$/;

	//Comprueba que en el campo solo se introducen caracteres alfanumericos.
	if(!expresion_reg_alfnum.test(campo.value)){
		
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		//Comprueba el que tamño del campo no supere el maximo indicado.
		if(campo.value.length > size){
			
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprobar que se introduce correctamente un email,
//y que no supere el tamaño indicado.
function comprobarEmail(campo, size){
	//Expresion regular para un email
	var expresion_reg_email=/^[A-Za-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/;

	if(!expresion_reg_email.test(campo.value)){
		
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		//Comprueba el que tamño del campo no supere el maximo indicado.
		if(campo.value.length > size){
			
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//////////////////////////////////////////////////////
///////Funciones Especificas para cada Campo/////////
////////////////////////////////////////////////////

//Comprueba que el campo login no este vacio y solo se introducen caracteres alfanumericos.
function comprobarLogin(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		if(comprobarAlfanumerico(campo, 10) == false){
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprueba que el campo password no este vacio y solo se introducen caracteres alfanumericos.
function comprobarPassword(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		if(comprobarAlfanumerico(campo, 15) == false){
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprueba que el campo nombre no este vacio y solo se introducen caracteres alfabeticos.
function comprobarNombre(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		if(comprobarAlfabetico(campo, 20) == false){
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprueba que el campo apellidos no este vacio y solo se introducen caracteres alfabeticos.
function comprobarApellidos(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		if(comprobarAlfabetico(campo, 30) == false){
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprueba que el campo email no este vacio y que lo introducido sea equivalente a la expresion regular correspondiente.
function comprobarEmail(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		if(comprobarEmail(campo, 50) == false){
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprueba que el campo rol no este vacio.
function comprobarRol(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		campo.style.borderColor = "#00ff66";
		return true;
	}
}

//Comprueba que el campo genero no este vacio.
function comprobarGenero(campo){
	if(comprobarVacio(campo) == false){
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		campo.style.borderColor = "#00ff66";
		return true;
	}
}