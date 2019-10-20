<?php
session_start();

include '../models/OferPromPartido_Model.php';
include '../views/InscripcionPartido_Showall_View.php';

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
  case 'EDIT':
    if($_REQUEST['tipo']=='OFER'){
      //header("Location: ../controllers/OfertaPartido_Controller.php?action=EDIT");

      $OFERTAPARTIDO = get_data_form();
      //$OFERTAPARTIDO = new OferPromPartidoModel('rachid1194@hotmail.com', '2019-10-20 18:46:54', '', '', '', '','', 'OFER');
      $respuestaEdit = $OFERTAPARTIDO->EDIT($_SESSION['email']);
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
        new MessageView($respuestaEdit, '../controllers/Usuario_Controller.php');
      }
    }else {
      header("Location: ../controllers/PromocionPartido_Controller.php?action=EDIT");
    }
  break;

  default:
    $OFERPROMPARTIDO = new OferPromPartidoModel('', '', '', '', '', '', '', '');
    $datos = $OFERPROMPARTIDO->SEARCH();
    new InscripcionPartidoShowallView($datos);
    break;
}


?>
