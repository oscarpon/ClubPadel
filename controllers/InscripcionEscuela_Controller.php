<?php
session_start();

include '../models/InscripcionEscuela_Model.php';
include '../models/Pago_Model.php';
include '../views/InscripcionEscuela_Add_View.php';
include '../views/InscripcionEscuela_Showall_View.php';

include '../views/Message_View.php';

function get_data_form(){
  $nombre = $_REQUEST['nombre'];
  $horario = $_REQUEST['horario'];
  $email = $_REQUEST['email'];

  $INSESC = new InscripCampModel($nombre,$horario,$email);
  return $INSESC;
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
      $ESC = new InscripcionEscuelaModel('','','');
      $datos = $ESC -> SEARCH_ESC();
      new InscripcionEscuelaAddView($datos);
    }else{
      $PAGO = new PagoModel($_SESSION['email'],'',30,'N');
      $PAGO->ADD();
      $INSESC = new InscripcionEscuelaModel($_REQUEST['nombre'], $_REQUEST['horario'],$_SESSION['email']);
      $respuesta = $INSESC -> ADD();
      new MessageView($respuesta, '../controllers/InscripcionEscuela_Controller.php');
    }
    break;

  default:
    $INSCRIP = new InscripcionEscuelaModel('', '', $_SESSION['email']);
    $datos = $INSCRIP->SEARCH();
    new InscripcionEscuelaShowallView($datos);
    break;
}


?>
