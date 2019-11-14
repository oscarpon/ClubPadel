<?php
session_start();

include '../models/Pareja_Model.php';
include '../models/Usuario_Model.php';
include '../views/Pareja_Add_View.php';
include '../views/Pareja_Delete_View.php';
include '../views/Pareja_Showall_View.php';

include '../views/Message_View.php';

function get_data_form(){
  $miembro1 = $_REQUEST['miembro1'];
  $miembro2 = $_REQUEST['miembro2'];
  $genero = $_REQUEST['genero'];
  $nivel = $_REQUEST['nivel'];

  $PAREJA = new ParejaModel($miembro1,$miembro2,$genero,$nivel);
  return $PAREJA;
}

//Comprueba si se accede con sesión o con rol correcto
if(!isset($_SESSION['email'])){
  header('Location: ../index.php');
}else if($_SESSION['rol'] != 'D'){
  header('Location: ../index.php');
}

if(!isset($_REQUEST['action'])){
  $_REQUEST['action'] = '';
}

switch ($_REQUEST['action']){
  case "ADD":
    if(!$_POST){
      new ParejaAddView();
    }else{
      $usuario1 = new UsuarioModel($_SESSION['email'],'','','','','');
      $genero1 = mysqli_fetch_array($usuario1->SEARCH())['genero'];
      $usuario2 = new UsuarioModel($_REQUEST['miembro2'],'','','','','');
      $genero2 = mysqli_fetch_array($usuario2->SEARCH())['genero'];

      $PAREJA = new ParejaModel($_SESSION['email'], $_REQUEST['miembro2'],'',$_REQUEST['nivel']);
      $respuesta = $PAREJA->ADD($genero1,$genero2);
      new MessageView($respuesta, '../controllers/Pareja_Controller.php');
    }
    break;

  case 'DELETE':
    if(!$_POST){
      $PAREJA = new ParejaModel($_REQUEST['miembro1'], $_REQUEST['miembro2'],$_REQUEST['genero'], $_REQUEST['nivel']);
      $datos= $PAREJA->RellenaDatos();
      new ParejaDeleteView($datos);
    }else{
      $PAREJA = get_data_form();
      $respuesta = $PAREJA->DELETE();
      new MessageView($respuesta, '../controllers/Pareja_Controller.php');
    }
    break;

  default:
    $PAREJA = new ParejaModel($_SESSION['email'], '','','');
    $datos = $PAREJA->SEARCH();
    new ParejaShowallView($datos);
    break;
}


?>
