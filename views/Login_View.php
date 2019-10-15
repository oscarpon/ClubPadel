<?php

	class Login{

/////////////////
		function __construct(){
			$this->render();
		}
////////////////
		function render(){

			include '../views/Header.php';
?>

<div class="formularioLogin">
	<form id="login" action='../controllers/Login_Controller.php' method='post'>
		<h3 id="iniciar">Iniciar Sesión</h3>
<div>
		<label id="email1" for="email"></label>
		<input type="email" id="email1" aria-describedby="emailHelp" placeholder="&#x1F464; Introduce tu email" onblur="comprobarEmail(email, 50)">
</div>
<div>
	<label for="password"></label>
	<input type="password" id="password" placeholder="&#128273; Contraseña" onblur="comprobarAlfanumerico(password, 15)">
</div>
<div>
	<a href="../controllers/Register_Controller.php" id="nocuenta">¿Aún no tienes cuenta?</a>
</div>
	<button onclick="validarLogin" type="submit" class="botonAcceder">Acceder</button>
</form>
</div>

<?php
			include '../Views/Footer.php';
		} //fin metodo render

	} //fin Login

?>
