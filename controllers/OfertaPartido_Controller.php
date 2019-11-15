<?php
session_start();

include '../models/OferPromPartido_Model.php';
include '../views/OfertaPartido_Add_View.php';
include '../views/OfertaPartido_Delete_View.php';
include '../views/OfertaPartido_Showall_View.php';

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

  $OFERTAPARTIDO = new OferPromPartidoModel($email,
                                          $fecha,
                                          $partic1,
                                          $partic2,
                                          $partic3,
                                          $partic4,
                                          $numpart,
                                          $tipo);
  return $OFERTAPARTIDO;
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
  case 'ADD':
    if(!$_POST){
      $OFERTAPARTIDO = new OferPromPartidoModel('', '', '', '', '', '', '', '');
      $arrayFechas = $OFERTAPARTIDO->comprobarDispFechas();
      if(empty($arrayFechas)){
        new MessageView("No hay pistas disponibles, no es posible ofertar partidos",
        '../controllers/OfertaPartido_Controller.php');
      }
      else{
        new OfertaPartidoAddView($arrayFechas);
      }
    }else{
      $OFERTAPARTIDO = new OferPromPartidoModel($_SESSION['email'], $_REQUEST['fecha'], $_SESSION['email'], '', '', '', 1, 'OFER');
      $respuesta = $OFERTAPARTIDO->ADD();
      new MessageView($respuesta, '../controllers/OfertaPartido_Controller.php');
    }
    break;
    
  case 'DELETE':
    if(!$_POST){
      $OFERTAPARTIDO = new OferPromPartidoModel($_REQUEST['email'], $_REQUEST['fecha'], '', '', '', '', '', '');
      $datos = $OFERTAPARTIDO->RellenaDatos($_REQUEST['email'], $_REQUEST['fecha']);
      new OfertaPartidoDeleteView($datos);
    }else{
      $OFERTAPARTIDO = get_data_form();
      $respuesta = $OFERTAPARTIDO->DELETE();
      new MessageView($respuesta, '../controllers/OfertaPartido_Controller.php');
    }
    break;

  default:
    $OFERTAPARTIDO = new OferPromPartidoModel($_SESSION['email'], '', '', '', '', '', '', 'OFER');
    $datos = $OFERTAPARTIDO->SEARCH();
    new OfertaPartidoShowallView($datos);
    break;
}


?>
