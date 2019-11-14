<?php
session_start();

include '../models/OferPromPartido_Model.php';
include '../models/Pago_Model.php';
include '../views/InscripcionPartido_Showall_View.php';
include '../views/MisInscripcionPartido_Showall_View.php';
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

  $OFERPROMPARTIDO = new OferPromPartidoModel($email,
                                          $fecha,
                                          $partic1,
                                          $partic2,
                                          $partic3,
                                          $partic4,
                                          $numpart,
                                          $tipo);
  return $OFERPROMPARTIDO;
}

if(!isset($_REQUEST['action'])){
  $_REQUEST['action'] = '';
}

switch ($_REQUEST['action']){
  case 'SHOWINSCRIP':
    $OFERPROMPARTIDO = new OferPromPartidoModel('', '', '', '', '', '', '', '');
    $datos = $OFERPROMPARTIDO->SEARCH();
    new InscripcionPartidoShowallView($datos);
    break;
  case 'EDIT':
      $OFERTAPARTIDO = get_data_form();
      $respuestaEdit = $OFERTAPARTIDO->EDIT($_SESSION['email']);
      $arrayPart = $OFERTAPARTIDO->comprobarParticipacion();
      if($arrayPart[0] == 4){
        $arrayPistas = $OFERTAPARTIDO->comprobarDispPistas();
        if(!empty($arrayPistas)){
          $respuestaCrear = $OFERTAPARTIDO->crearPartido($arrayPistas);
          if($_REQUEST['tipo'] == 'PROM'){
            $PAGO = new PAGO($_SESSION['email'],'',12,'N');
            $PAGO->ADD();
          }
          new MessageView($respuestaCrear, '../controllers/InscripcionPartido_Controller.php');
        }else{
          new MessageView("No hay pistas disponibles actualmente, el partido ha
          sido cancelado.", '../controllers/InscripcionPartido_Controller.php');
        }
        $OFERTAPARTIDO->DELETE();
      }else{
        new MessageView($respuestaEdit, '../controllers/InscripcionPartido_Controller.php');
      }
  break;

  case 'DESAPUNTARSE':
      $OFERPROMPARTIDO = get_data_form();
      $respuesta = $OFERPROMPARTIDO->DESAPUNTARSE($_SESSION['email']);
      new MessageView($respuesta, '../controllers/InscripcionPartido_Controller.php');
    break;

  default:
    $OFERPROMPARTIDO = new OferPromPartidoModel('', '', '', '', '', '', '', '');
    $datos = $OFERPROMPARTIDO->misInscripSEARCH($_SESSION['email']);
    new MisInscripcionPartidoShowallView($datos);
    break;
}


?>
