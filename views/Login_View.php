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



<div class="container col-lg-3 bg-light mt-5 border ">
	<form>
		<h3 id="iniciar">Iniciar Sesión</h3>
<div class="form-group" action='../controllers/Login_Controller.php' method='post'>
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Introduce email" onblur="comprobarEmail(email, 50)">
		<div class="invalid-feedback">
        Please provide a valid state.
      </div>
</div>
<div class="form-group">
<label for="password">Contraseña</label>
<input type="password" class="form-control required" id="password" placeholder="Contraseña" >
</div>
<div class="pb-2">
	<a href="../controllers/Register_Controller.php" id="nocuenta">¿Aún no tienes cuenta?</a>
</div>
<button type="submit" class="btn btn-dark mb-2">Acceder</button>
</form>
</div>

	<img id="imagen1" src="../src/padel4.jpg">



<?php
			include '../Views/Footer.php';
		} //fin metodo render

	} //fin Login

?>
