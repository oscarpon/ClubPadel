<?php
//Controllador usuarios
  session_start();

  include '../models/Usuario_Model.php';
  include '../views/Usuario_Add_View.php';
  include '../views/Usuario_Delete_View.php';
  include '../views/Usuario_Showall_View.php';
  include '../views/Message_View.php';

  //Función que recoge la información del formulario
  function get_data_form(){
      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];
      $nombre = $_REQUEST['nombre'];
      $apellidos = $_REQUEST['apellidos'];
      $rol = $_REQUEST['rol'];
      $genero = $_REQUEST['genero'];

      $USUARIO = new UsuarioModel(
        $email,
        $password,
        $nombre,
        $apellidos,
        $rol,
        $genero
      );
        return $USUARIO;
  }
  //Comprueba si se accede con sesión o con rol correcto
  if(!isset($_SESSION['email'])){
    header('Location: ../index.php');
  }else if($_SESSION['rol'] != 'A'){
    header('Location: ../index.php');
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
        new UsuarioAddView();
      }
      else{
        $USUARIO = get_data_form();
        $respuesta = $USUARIO -> ADD();
        new MessageView($respuesta, '../controllers/Usuario_Controller.php');
      }
      break;

    //Caso borrar
    case 'DELETE':
      if(!$_POST){
        $USUARIO = new UsuarioModel($_REQUEST['email'],'','','','','');
        $valores = $USUARIO->RellenaDatos($_REQUEST['email']);
        new UsuarioDeleteView($valores);
      }
      else{
        $USUARIO = get_data_form();
        $respuesta = $USUARIO->DELETE();
        new MessageView($respuesta, '../controllers/Usuario_Controller.php');
      }
      break;

    //Caso por defecto
    default:
      if(!$_POST){
        $USUARIO = new UsuarioModel('','','','','','');
      }else{
        $USUARIO = get_data_form();
      }

      $datos = $USUARIO->SEARCH();
      $lista = array('email','password', 'nombre', 'apellidos', 'rol', 'genero');
      new UsuarioShowallView($datos);
      break;
  }

?>
