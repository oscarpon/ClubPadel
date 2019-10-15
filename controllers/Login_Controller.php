<?php

session_start();

if(!(isset($_REQUEST['email1'])) && !(isset($_REQUEST['password']))){//if
	include '../views/Login_View.php';
	$login = new Login();//var
}
else{///else

	include '../models/Access_DB.php';

	include '../models/Usuario_Model.php';
	$usuario = new UsuarioModel($_REQUEST['email'],$_REQUEST['password'],'','','','');/////
	$respuesta = $usuario->login();

	if ($respuesta == 'true'){/////
		session_start();
		$_SESSION['email'] = $_REQUEST['email'];////
		header('Location:../index.php');
	}
	else{/////
		include '../views/Message_View.php';
		new MessageView($respuesta, './Login_Controller.php');
	}

}

?>
