<?php
/*
autor serg
clase
fecha 30/11/2018*/
	class Login{

/////////////////
		function __construct(){
			$this->render();
		}
////////////////
		function render(){

			include '../Views/Header.php';
?>
<div class="container">
	<form>
<div class="form-group" action='../controllers/Login_Controller.php' method='post'>
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Contraseña</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>


<?php
			include '../Views/Footer.php';
		} //fin metodo render

	} //fin Login

?>
