<?php

session_start();
//incluir funcion autenticacion
//include '../Functions/Authentication.php';
//si no esta autenticado
/*if (!IsAuthenticated()){//if
	header('Location: ../index.php');
}*/
//esta autenticado
//else{

		include '../Views/Login_View.php';
	new Login();


//}

?>
