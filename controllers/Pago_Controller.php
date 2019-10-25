<?php
//Controlador pagos
session_start();

include '../models/Pago_Model.php';
include '../views/Pago_Add_View.php';
//include '../views/Partido_Delete_View.php';
include '../views/Pago_Showall_View.php';
include '../views/Message_View.php';

function get_data_form(){
  $email = $_REQUEST['email'];
  $fecha = $_REQUEST['fecha'];
  $importe = $_REQUEST['importe'];
  $pagado = $_REQUEST['pagado'];

  $PAGO = new PagoModel($email,
                        $fecha,
                        $importe,
                        $pagado);
  return $PAGO;
}

//Comprueba si se accede con alguna acción
if(!isset($_REQUEST['action'])){
  $_REQUEST['action'] = '';
}

//Según la acción se ejecuta un caso
switch ($_REQUEST['action']) {
  //Caso añadir
  case 'ADD':
    if(!$_POST){
      new PagoAddView();
    }
    else{
      $PAGO = new PagoModel($_REQUEST['email'], '', $_REQUEST['importe'], $_REQUEST['pagado']);
      $respuesta = $PAGO -> ADD();
      new MessageView($respuesta, '../controllers/Pago_Controller.php');
    }
    break;

  /*//Caso borrar
  case 'DELETE':
    if(!$_POST){
      $PARTIDO = new PartidoModel($_REQUEST['codigoPista'],$_REQUEST['fecha'],'','','','','');
      $valores = $PARTIDO->RellenaDatos($_REQUEST['codigoPista']);
      new PistaDeleteView($valores);
    }
    else{
      $PARTIDO = get_data_form();
      $respuesta = $PARTIDO->DELETE();
      new MessageView($respuesta, '../controllers/Partido_Controller.php');
    }
    break;*/
  //Caso editar
  case 'EDIT':
    $PAGO = new PagoModel($_REQUEST['email'], $_REQUEST['fecha'], $_REQUEST['importe'], '');
    $respuesta = $PAGO -> EDIT();
    new MessageView($respuesta, '../controllers/Pago_Controller.php');
    break;

  //Caso por defecto
  default:
    $PAGO = new PagoModel('','','','');
    $datos = $PAGO->SEARCH();
    new PagoShowallView($datos);
    break;
}
 ?>
