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



<div class="container col-lg-3 bg-light mt-5 border rounded">
	<form>
		<h3 class="iniciar">Iniciar Sesión</h3>
<div class="form-group" action='../controllers/Login_Controller.php' method='post'>
		<label for="exampleInputEmail1">Email</label>
		<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce email">

</div>
<div class="form-group">
<label for="exampleInputPassword1">Contraseña</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
</div>
<div class="pb-2">
	<a href="#" id="nocuenta">¿Aún no tienes cuenta?</a>
</div>
<button type="submit" class="btn btn-dark mb-2">Acceder</button>
</form>
</div>

	<img class="imagen1" src="../src/padel4.jpg">



<?php
			include '../Views/Footer.php';
		} //fin metodo render

	} //fin Login

?>
