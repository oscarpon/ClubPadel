<?php

//se va usar la session de la conexion
session_start();

//funcion de autenticacion
include './Functions/Authentication.php';

//si no ha pasado por el login de forma correcta
if (!IsAuthenticated()){
	header('Location:./controllers/LoginController.php');
}
//si ha pasado por el login de forma correcta
else{
	header('Location:./Controllers/IndexController.php');
}

?>

 ?>
