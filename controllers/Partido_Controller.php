<?php
//Controlador partidos
session_start();

include '../models/Partido_Model.php';
include '../views/Partido_Add_View.php';
include '../views/Partido_Delete_View.php';
include '../views/Partido_Showall_View.php';
include '../views/Message_View.php';

function get_data_form(){
  $codigoPista = $_REQUEST['codigoPista'];
  $fecha = $_REQUEST['fecha'];
  $miembro1Par1 = $_REQUEST['miembro1Par1'];
  $miembro2Par1 = $_REQUEST['miembro2Par1'];
  $miembro1Par2 = $_REQUEST['miembro1Par2'];
  $miembro2Par2 = $_REQUEST['miembro2Par2'];
  $resultado = $_REQUEST['resultado'];

  $PARTIDO = new PartidoModel($codigoPista,
                              $fecha,
                              $miembro1Par1,
                              $miembro2Par1,
                              $miembro1Par2,
                              $miembro2Par2,
                              $resultado);
  return $PARTIDO;
}

//Comprueba si se accede con sesión o con rol correcto
if(!isset($_SESSION['email'])){
  header('Location: ../index.php');
}else if($_SESSION['rol'] != 'A'){
  header('Location: ../index.php');
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
      new PartidoAddView();
    }
    else{
      $PARTIDO = get_data_form();
      $respuesta = $PARTIDO -> ADD();
      new MessageView($respuesta, '../controllers/Partido_Controller.php');
    }
    break;

  //Caso borrar
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
    break;

  //Caso por defecto
  default:
    if(!$_POST){
      $PARTIDO = new PartidoModel('','','','','','','');
    }else{
      $PARTIDO = get_data_form();
    }

    $datos = $PARTIDO->SEARCH();
    new PartidoShowallView($datos);
    break;
}
 ?>
