
////////////////////////////////////
///////Funciones Genericas/////////
//////////////////////////////////

//Comprobar si un campo esta vacio.
function comprobarVacio(campo){
	if(campo.value == null || campo.value.length == 0 || campo.value == ""){
		alert("El campo "+campo.name+" no puede estar vacio.");
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		campo.style.backgroundColor = "ffffff";
		campo.style.borderColor = "#00ff66";
		return true;
	}
}

//Comprobar que solo se introducen caracteres alfabeticos, y que no supere el tama�o indicado.
function comprobarAlfabetico(campo, size){

	//Expresion regular para comprobar que solo se introducen caracteres alfabeticos.
	var expresion_reg_alf=/(([A-Za-z]+)(\s)?([A-Za-z]+)?)/;

	//Comprueba que en el campo solo se introducen caracteres alfabeticos.
	if(!expresion_reg_alf.test(campo.value)){
		alert("El campo "+campo.name+" solo puede contener caracteres alfabeticos.");
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		//Comprueba el que tama�o del campo no supere el maximo indicado.
		if(campo.value.length > size){
			alert("El campo "+campo.name+" no puede superar la longitud maxima( "+size+" caracteres).");
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.backgroundColor = "ffffff";
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprobar que solo se introducen caracteres alfanumericos, y que no supere el tama�o indicado.
function comprobarAlfanumerico(campo, size){

	//Expresion regular para comprobar que solo se introducen caracteres alfanumericos.
	var expresion_reg_alfnum=/^[A-Za-z������������0-9]+$/;

	//Comprueba que en el campo solo se introducen caracteres alfanumericos.
	if(!expresion_reg_alfnum.test(campo.value)){
		alert("El campo "+campo.name+" solo puede contener caracteres alfanumericos.");
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		//Comprueba el que tam�o del campo no supere el maximo indicado.
		if(campo.value.length > size){
			alert("El campo "+campo.name+" no puede superar la longitud maxima( "+size+" caracteres).");
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.backgroundColor = "ffffff";
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//Comprobar que se introduce correctamente un email, y que no supere el tama�o indicado.
function comprobarEmail(campo, size){
	//Expresion regular para un email
	var expresion_reg_email=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/;

	if(!expresion_reg_email.test(campo.value)){
		alert("El formato del email es invalido.");
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		//Comprueba el que tam�o del campo no supere el maximo indicado.
		if(campo.value.length > size){
			alert("El campo "+campo.name+" no puede superar la longitud maxima( "+size+" caracteres).");
			campo.style.borderColor = "#d32e12";
			return false;
		}
		else{
			campo.style.backgroundColor = "ffffff";
			campo.style.borderColor = "#00ff66";
			return true;
		}
	}
}

//////////////////////////////////////////////////////
///////////////////// LOGIN /////////////////////////
////////////////////////////////////////////////////

//Realiza el submit del Login.
function submitLogin(){
	alert("Formulario Enviado.");
	document.getElementById("login").submit();
}

//Valida el submit de Login. En caso de que todo este correcto realiza el submit.
function validarLogin(){
	//variables para seleccionar los campos email y password.
	var correo;
	var passwd;
	correo = document.getElementById("email");
	passwd = document.getElementById("password");

	//Comprueba el campo email.
	if(comprobarVacio(correo) == false){
		correo.style.borderColor = "#d32e12";
		correo.focus();
		return false;
	}
	else{
		if(comprobarEmail(correo, 50) == false){
			correo.style.borderColor = "#d32e12";
			correo.focus();
			return false;
		}
		else{
			correo.style.backgroundColor = "ffffff";
			correo.style.borderColor = "#00ff66";
		}
	}

	//Comprueba el campo password
	if(comprobarVacio(passwd) == false){
		passwd.style.borderColor = "#d32e12";
		passwd.focus();
		return false;
	}
	else{
		if(comprobarAlfanumerico(passwd, 15) == false){
			passwd.style.borderColor = "#d32e12";
			passwd.focus();
			return false;
		}
		else{
			passwd.style.backgroundColor = "ffffff";
			passwd.style.borderColor = "#00ff66";
		}
	}

	confirm("El formulario esta correcto.");
	submitLogin();
	return true;
}

function comprobarFecha(campo){
	var hoy = new Date();
	var fecha = hoy.getFullYear()+'-'+(hoy.getMonth() + 1)+'-'+hoy.getDate();
	var hora = hoy.getHours()+':'+hoy.getMinutes();
	var fechaTodo = fecha+' '+hora;
	if(campo.value < fechaTodo){
		alert("La fecha no puede ser anterior a hoy");
		campo.style.borderColor = "#d32e12";
		return false;
	}
	else{
		campo.style.backgroundColor = "ffffff";
		campo.style.borderColor = "#00ff66";
		return true;
	}
}

//////////////////////////////////////////////////////
////////////////// REGISTER /////////////////////////
////////////////////////////////////////////////////

//Realiza el submit del Register.
function submitRegister(){
	alert("Formulario Enviado.");
	document.getElementById("registro").submit();
}

//Valida el submit de Login. En caso de que todo este correcto realiza el submit.
function validarRegister(){
	//variables para seleccionar los campos email y password.
	var nombre;
	var apellidos;
	var passwd;
	var correo;
	var genero;
	nombre = document.getElementById("nombre");
	apellidos = document.getElementById("apellidos");
	passwd = document.getElementById("password");
	correo = document.getElementById("email");
	genero = document.getElementById("genero");

	//Comprueba el campo nombre.
	if(comprobarVacio(nombre) == false){
		nombre.style.borderColor = "#d32e12";
		nombre.focus();
		return false;
	}
	else{
		if(comprobarAlfabetico(nombre, 20) == false){
			nombre.style.borderColor = "#d32e12";
			nombre.focus();
			return false;
		}
		else{
			nombre.style.backgroundColor = "ffffff";
			nombre.style.borderColor = "#00ff66";
		}
	}

	//Comprueba el campo apellidos.
	if(comprobarVacio(apellidos) == false){
		apellidos.style.borderColor = "#d32e12";
		apellidos.focus();
		return false;
	}
	else{
		if(comprobarAlfabetico(apellidos, 30) == false){
			apellidos.style.borderColor = "#d32e12";
			apellidos.focus();
			return false;
		}
		else{
			apellidos.style.backgroundColor = "ffffff";
			apellidos.style.borderColor = "#00ff66";
		}
	}

	//Comprueba el campo password
	if(comprobarVacio(passwd) == false){
		passwd.style.borderColor = "#d32e12";
		passwd.focus();
		return false;
	}
	else{
		if(comprobarAlfanumerico(passwd, 15) == false){
			passwd.style.borderColor = "#d32e12";
			passwd.focus();
			return false;
		}
		else{
			passwd.style.backgroundColor = "ffffff";
			passwd.style.borderColor = "#00ff66";
		}
	}

	//Comprueba el campo email.
	if(comprobarVacio(correo) == false){
		correo.style.borderColor = "#d32e12";
		correo.focus();
		return false;
	}
	else{
		if(comprobarEmail(correo, 50) == false){
			correo.style.borderColor = "#d32e12";
			correo.focus();
			return false;
		}
		else{
			correo.style.backgroundColor = "ffffff";
			correo.style.borderColor = "#00ff66";
		}
	}

	//Comprueba el campo genero.
	if(comprobarVacio(genero) == false){
		genero.style.borderColor = "#d32e12";
		genero.focus();
		return false;
	}
	else{
		genero.style.backgroundColor = "ffffff";
		genero.style.borderColor = "#00ff66";
	}

	confirm("El formulario esta correcto.");
	submitRegister();
	return true;
}
