<?php
//Controllador usuarios
  session_start();

  include '../models/UsuarioModel.php';
  include '../views/UsuarioAddView.php';
  include '../views/UsuarioDeleteView.php';
  include '../views/UsuarioShowallView.php';
  include '../views/MessageView.php';

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
        )
        return $USUARIO;
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
        new UsuarioAdd();
      }
      else{
        $USUARIO = get_data_form();
        $respuesta = $USUARIO -> ADD();
        new Message($respuesta, '../controllers/UsuarioController.php');
      }
      break;

    //Caso borrar
    case 'DELETE':
      if(!$_POST){
        $USUARIO = new UsuarioModel($_REQUEST['email'],'','','','','');
        $valores = $USUARIO->RellenaDatos($_REQUEST['email']);
        new UsuarioDelete($valores);
      }
      else{
        $USUARIO = get_data_form();
        $respuesta = $USUARIO->DELETE();
        new Message($respuesta, '../controllers/UsuarioController.php');
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
      new UsuarioShowall($lista, $datos);
      break;
  }

?>
