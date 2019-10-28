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
/*
    case 'EDIT':
        //$OFERTAPARTIDO = get_data_form();
        $PROMOCIONPARTIDO = new OferPromPartidoModel('rachid1194@hotmail.com', '2019-10-20 18:46:54', '', '', '', '','', 'PROM');
        //$respuestaEdit = $OFERTAPARTIDO->EDIT();
        $arrayPart = $PROMOCIONPARTIDO->comprobarParticipacion();
        if($arrayPart[0] == 4){
          $arrayPistas = $PROMOCIONPARTIDO->comprobarDispPistas();
          if(!empty($arrayPistas)){
            $respuestaCrear = $PROMOCIONPARTIDO->crearPartido($arrayPistas);
            //new MessageView($respuestaCrear, '../controllers/OfertaPartido_Controller.php');
            new MessageView($respuestaCrear, '../controllers/Register_Controller.php');
          }else{
            new MessageView("No hay pistas disponibles actualmente, el partido ha
            sido cancelado.", '../controllers/PromocionPartido_Controller.php');
          }
        }else{
          //new MessageView($respuestaEdit, '../controllers/OfertaPartido_Controller.php');
          new MessageView('NADA', '../controllers/Usuario_Controller.php');
        }
      break;
*/
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
