<?php

session_start();

if(!(isset($_REQUEST['email'])) && !(isset($_REQUEST['password']))){//if
	include '../views/Login_View.php';
	$login = new Login();//var
}
else{///else

	include '../models/Access_DB.php';

	include '../models/Usuario_Model.php';
	$usuario = new UsuarioModel($_REQUEST['email'],$_REQUEST['password'],'','','','');/////
	$respuesta = $usuario->login();
	$datos = $usuario->RellenaDatos();

	if ($respuesta == 'true'){/////
		session_start();
		$_SESSION['email'] = $_REQUEST['email'];////
		$_SESSION['rol'] = $datos[4];////
		header('Location:../index.php');
	}
	else{/////
		include '../views/Message_View.php';
		new MessageView($respuesta, './Login_Controller.php');
	}

}

?>
