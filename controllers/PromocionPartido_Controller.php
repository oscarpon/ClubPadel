<?php
session_start();

include '../models/OferPromPartido_Model.php';
include '../views/PromocionPartido_Add_View.php';
include '../views/PromocionPartido_Delete_View.php';
include '../views/PromocionPartido_Showall_View.php';

include '../views/Message_View.php';

function get_data_form(){
  $email = $_REQUEST['email'];
  $fecha = $_REQUEST['fecha'];
  $partic1 = $_REQUEST['partic1'];
  $partic2 = $_REQUEST['partic2'];
  $partic3 = $_REQUEST['partic3'];
  $partic4 = $_REQUEST['partic4'];
  $numpart = $_REQUEST['numpart'];
  $tipo = $_REQUEST['tipo'];

  $PROMOCIONPARTIDO = new OferPromPartidoModel($email,
                                          $fecha,
                                          $partic1,
                                          $partic2,
                                          $partic3,
                                          $partic4,
                                          $numpart,
                                          $tipo);
  return $PROMOCIONPARTIDO;
}

//Comprueba si se accede con sesión o con rol correcto
if(!isset($_SESSION['email'])){
  header('Location: ../index.php');
}else if($_SESSION['rol'] != 'A'){
  header('Location: ../index.php');
}

if(!isset($_REQUEST['action'])){
  $_REQUEST['action'] = '';
}

switch ($_REQUEST['action']){
  case "ADD":
    if(!$_POST){
      $PROMOCIONPARTIDO = new OferPromPartidoModel('', '', '', '', '', '', '', '');
      $arrayFechas = $PROMOCIONPARTIDO->comprobarDispFechas();
      if(empty($arrayFechas)){
        new MessageView("No hay pistas disponibles, no es posible promocionar partidos",
        '../controllers/PromocionPartido_Controller.php');
      }
      else{
        new PromocionPartidoAddView($arrayFechas);
      }
    }else{
      $PROMOCIONPARTIDO = new OferPromPartidoModel($_SESSION['email'], $_REQUEST['fecha'], 'Puesto vacio', '', '', '', 0,'PROM');
      $respuesta = $PROMOCIONPARTIDO->ADD();
      new MessageView($respuesta, '../controllers/PromocionPartido_Controller.php');
    }
    break;
    
  case 'DELETE':
    if(!$_POST){
      $PROMOCIONPARTIDO = new OferPromPartidoModel($_REQUEST['email'], $_REQUEST['fecha'], '', '', '', '', '', '');
      $datos = $PROMOCIONPARTIDO->RellenaDatos($_REQUEST['email'], $_REQUEST['fecha']);
      new PromocionPartidoDeleteView($datos);
    }else{
      $PROMOCIONPARTIDO = get_data_form();
      $respuesta = $PROMOCIONPARTIDO->DELETE();
      new MessageView($respuesta, '../controllers/PromocionPartido_Controller.php');
    }
    break;

  default:
    $PROMOCIONPARTIDO = new OferPromPartidoModel('', '', '', '', '', '', '', 'PROM');
    $datos = $PROMOCIONPARTIDO->SEARCH();
    new PromocionPartidoShowallView($datos);
    break;
}


?>
