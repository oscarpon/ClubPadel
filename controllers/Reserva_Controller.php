<?php
//Controllador usuarios
  session_start();

  include '../models/Reserva_Model.php';
  include '../views/Reserva_Add_View.php';
  include '../views/Reserva_Showall_View.php';
  include '../views/Message_View.php';

  //Función que recoge la información del formulario
  function get_data_form(){
      $email = $_REQUEST['email'];
      $fecha = $_REQUEST['fecha'];
      $codigoPista = $_REQUEST['codigoPista'];

      $RESERVA = new ReservaModel(
        $email,
        $fecha,
        $codigoPista
      );
        return $RESERVA;
  }
  //Comprueba si se accede con una acción
  if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = '';
  }

  //Según la acción se lanzan instrucciones
  switch ($_REQUEST['action']) {

    //Caso añadir
    case 'ADD':
      if(!$_POST){
        new ReservaAddView();
      }
      else{
        $RESERVA = new ReservaModel($_SESSION ['email'],'','');
        $arrayPistas = $RESERVA->comprobarDispPistas();

        if(!empty($arrayPistas)){
          $respuesta = $RESERVA -> ADD($arrayPistas);
          new MessageView($respuesta, '../controllers/Reserva_Controller.php');
        }else{
          new MessageView("No hay pistas disponibles actualmente.", '../controllers/Reserva_Controller.php');
        }
      }
      break;

    //Caso borrar
    case 'DELETE':
        $RESERVA = get_data_form();
        $respuesta = $RESERVA->DELETE();
        new MessageView($respuesta, '../controllers/Reserva_Controller.php');
      break;

    //Caso por defecto
    default:
      $RESERVA = new ReservaModel($_SESSION['email'],'','');
      $datos = $RESERVA->SEARCH();
      new ReservaShowallView($datos);
      break;
  }

?>
