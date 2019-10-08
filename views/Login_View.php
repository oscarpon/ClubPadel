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
			<h1><?php echo $strings['Login']; ?></h1>
			<form name = 'Form' action='../Controllers/Login_Controller.php' method='post' >

                login : <input type = 'text' name = 'login' placeholder = 'Utiliza tu Dni' size = '9' value = '' pattern="^[0-9]{8}[A-Z]$" onblur="validarDNI(this,'emlog');"  required><p id="emlog"></p><br>

					password : <input type = 'password' name = 'password' placeholder = 'Letras y numeros' size = '15' pattern="^([0-9a-zA-ZÀ-ÿ\u00f1\u00d1]+)([ ]+([0-9a-zA-ZÀ-ÿ\u00f1\u00d1]*))*$" value = '' required ><br>

					<button type='submit' name='action' class='botonconfirmar' value='Login'>

			</form>

<?php
			include '../Views/Footer.php';
		} //fin metodo render

	} //fin Login

?>
