<?php
session_start();

include '../models/InscripCamp_Model.php';
include '../models/Campeonato_Model.php';
include '../models/Pareja_Model.php';
include '../views/InscripCamp_Add_View.php';
include '../views/InscripCamp_Delete_View.php';
include '../views/MisInscripCamp_Showall_View.php';
include '../views/InscripPareja_Add_View.php';

include '../views/Message_View.php';

function get_data_form(){
  $miembro1 = $_REQUEST['miembro1'];
  $miembro2 = $_REQUEST['miembro2'];
  $nombreCamp = $_REQUEST['nombreCamp'];

  $PARTCAMP = new InscripCampModel($miembro1,$miembro2, $nombreCamp);
  return $PARTCAMP;
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
      $CAMP = new CampeonatoModel('','','','','abierto');
      $datos = $CAMP -> SEARCH();
      new InscripCampAddView($datos);
    }else{
      $PARTCAMP = get_data_form();
      $respuesta = $PARTCAMP -> ADD();
      new MessageView($respuesta, '../controllers/InscripcionCampeonato_Controller.php');
    }
    break;

  case 'DELETE':
    if(!$_POST){
      $INSCRIP = new InscripCampModel($_REQUEST['miembro1'], $_REQUEST['miembro2'],$_REQUEST['nombreCamp']);
      $datos= $INSCRIP->RellenaDatos();
      new InscripCampDeleteView($datos);
    }else{
      $INSCRIP = get_data_form();
      $respuesta = $INSCRIP->DELETE();
      new MessageView($respuesta, '../controllers/InscripCamp_Controller.php');
    }
    break;
  case 'SHOWPAREJA':
    $PAREJA = new ParejaModel($_SESSION['email'], '', $_REQUEST['genero'],'');
    $datos = $PAREJA -> mostrarParejaNivel($_REQUEST['categoria']);
    new InscripParejaAddView($datos, $_REQUEST['nombreCamp']);
    break;

  default:
    $PARTCAMP = new InscripCampModel($_SESSION['email'], '', '');
    $datos = $PARTCAMP->SEARCH();
    new MisInscripCampShowallView($datos);
    break;
}


?>
