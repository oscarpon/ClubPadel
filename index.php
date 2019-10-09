<?php

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Autenticacion.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
	header('Location:./controllers/Login_Controller.php');
}
//si ha pasado por el login de forma correcta
else{
	header('Location:./Controllers/Index_Controller.php');
}

?>
