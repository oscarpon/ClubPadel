<?php
//Controllador usuarios
  session_start();

  include '../models/Reserva_Model.php';
  include '../views/Reserva_Add_View.php';
  include '../views/Reserva_Showall_View.php';
  include '../views/Reserva_Delete_View.php';
  include '../views/Message_View.php';
  include '../models/Pago_Model.php';
  include '../models/Noticia_Model.php';
  include '../models/OferPromPartido_Model.php';

  //Función que recoge la información del formulario
  function get_data_form(){
      $email = $_REQUEST['email'];
      $fecha = $_REQUEST['fecha'];
      $codigoPista = $_REQUEST['codigoPista'];

      $RESERVA = new ReservaModel(
        $email,
        $codigoPista,
        $fecha
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
        //Recoge las fechas de pistas disponibles
        $RESERVA = new ReservaModel('', '', '');
        $arrayFechas = $RESERVA->comprobarDispFechas();
        //Comprueba si no hay fechas disponibles
        if(empty($arrayFechas)){
          new MessageView("No hay pistas disponibles, no es posible realizar la reserva.",
          '../controllers/Reserva_Controller.php');
        }
        else{
          new ReservaAddView($arrayFechas);
        }
      }

      else{
        $RESERVA = new ReservaModel($_SESSION ['email'],'',$_REQUEST ['fecha']);
        $pistas = $RESERVA->comprobarDispPistas();
        //Comprueba si hay pistas disponibles
        if($pistas -> num_rows > 0){
          $arrayPistas = $pistas->fetch_array();
          //Se inserta el pago
          $PAGO = new PagoModel($_SESSION['email'],'',35,'N');
          $PAGO->ADD();
          //Se inserta la notificación de pago
          $NOTIF = new NoticiaModel('','Nuevo pago','Nuevo pago de reserva pendiente', $_SESSION['email']);
          $NOTIF->insertarNoticia();
          //Crea la reserva
          $respuesta = $RESERVA -> ADD($arrayPistas);
          //Consulta las ofertas y promociones que hay para esa fecha
          $OFERPROM = new OferPromPartidoModel('',$_REQUEST['fecha'],'','','','','','');
          $oferprompartido = $OFERPROM->SEARCH();
          //Comprueba si era la última pista y hay ofertas y promociones en esa fecha
          if($pistas -> num_rows == 1 && $oferprompartido -> num_rows > 0){
             $OFERPROM->DELETEALL();
          }
          new MessageView($respuesta, '../controllers/Reserva_Controller.php');
        }else{
          new MessageView("No hay pistas disponibles actualmente.", '../controllers/Reserva_Controller.php');
        }
      }
      break;

    //Caso borrar
    case 'DELETE':
        if(!$_POST){
          $RESERVA = get_data_form();
          $datos = $RESERVA->RellenaDatos();
          new ReservaDeleteView($datos);
        }
        else{
          $RESERVA = get_data_form();
          $respuesta = $RESERVA->DELETE();
          new MessageView($respuesta, '../controllers/Reserva_Controller.php');
        }
      break;

    //Caso por defecto
    default:
      $RESERVA = new ReservaModel($_SESSION['email'],'','');
      $datos = $RESERVA->SEARCH();
      new ReservaShowallView($datos);
      break;
  }

?>
