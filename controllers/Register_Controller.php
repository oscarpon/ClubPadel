<?php
session_start();


//session_start();
if(!isset($_POST['login'])){
	include '../views/Register_View.php';
	$register = new Register();
}
else{



	include '../models/Usuario_Model.php';
    //var
	$usuario = new UsuarioModel($_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['password'],$_REQUEST['email'],
		$_REQUEST['genero']);
	$respuesta = $usuario->Register();//var

	if ($respuesta == 'true'){//if
		$respuesta = $usuario->Register();
		//Include '../Views/MESSAGE_View.php';
		new Message($respuesta, './Login_Controller.php');
	}
	else{//else
		//include '../Views/MESSAGE_View.php';
		new Message($respuesta, './Login_Controller.php');
	}

}

?>
