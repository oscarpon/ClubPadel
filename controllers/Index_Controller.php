<?php

session_start();
//incluir funcion autenticacion
//include '../Functions/Authentication.php';
//si no esta autenticado
include '../functions/Autenticacion.php';
if (!IsAuthenticated()){//if
	header('Location: ../index.php');
}
//esta autenticado
else{
	header('Location: ../controllers/Noticias_Controller.php?action=PagPrincipal');

}

?>
