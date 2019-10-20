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

if(!isset($_REQUEST['action'])){
  $_REQUEST['action'] = '';
}

switch ($_REQUEST['action']){
  case 'ADD':
    if(!$_POST){
      new OfertaPartidoAddView();
    }else{
      $OFERTAPARTIDO = new OferPromPartidoModel($_SESSION['email'], '', $_SESSION['email'], '', '', '', 1, 'OFER');
      $respuesta = $OFERTAPARTIDO->ADD();
      new MessageView($respuesta, '../controllers/OfertaPartido_Controller.php');
    }
    break;

  case 'EDIT':
      //$OFERTAPARTIDO = get_data_form();
      $OFERTAPARTIDO = new OferPromPartidoModel('rachid1194@hotmail.com', '2019-10-20 18:46:54', '', '', '', '','', 'OFER');
      //$respuestaEdit = $OFERTAPARTIDO->EDIT();
      $arrayPart = $OFERTAPARTIDO->comprobarParticipacion();
      if($arrayPart[0] == 4){
        $arrayPistas = $OFERTAPARTIDO->comprobarDispPistas();
        if(!empty($arrayPistas)){
          $respuestaCrear = $OFERTAPARTIDO->crearPartido($arrayPistas);
          //new MessageView($respuestaCrear, '../controllers/OfertaPartido_Controller.php');
          new MessageView($respuestaCrear, '../controllers/Register_Controller.php');
        }else{
          new MessageView("No hay pistas disponibles actualmente, el partido ha
          sido cancelado.", '../controllers/OfertaPartido_Controller.php');
        }
      }else{
        //new MessageView($respuestaEdit, '../controllers/OfertaPartido_Controller.php');
        new MessageView('NADA', '../controllers/Usuario_Controller.php');
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
