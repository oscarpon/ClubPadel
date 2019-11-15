<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Campeonato_Current_View.php';
include '../models/Campeonato_Model.php';
include '../views/Campeonato_Delete_View.php';
include '../views/Message_View.php';


function get_data(){
	$codigoPista = $_REQUEST['codigoPista'];
	$fecha ='';
	$miembro1Par1 ='';
	$miembro2Par1 = '' ;
	$miembro1Par2='';
  $miembro2Par2='';
  $nombreCamp='';
  $resultado='';
	$action = $_REQUEST['action'];
	$campeonato = new CampeonatoModel(
		$nombre,
		$fechaFinIns,
		$categoria,
		$genero,
		$estado,
		$action
	);
	return $campeonato;
}

switch ($_REQUEST['action']) {
  case 'ADD':
    	if (!$_POST) {
    		new CampeonatoAddView();
    	}
			else{

				$sql = new CampeonatoModel($_REQUEST['nombre'], $_REQUEST['fechaFinIns'],$_REQUEST['categoria'], $_REQUEST['genero'], $_REQUEST['estado']);
				$result = $sql->añadirCampeonato();
					new MessageView($result,'./Campeonato_Controller.php');
			}
    break;

  case 'DELETE':
	if (!$_POST) {
		$modelo= new CampeonatoModel($_REQUEST['nombre'],'', '', '', '');
		$datos= $modelo ->RellenaDatos();
		new CampeonatoDeleteView($datos);
	}
	else{
		$modelo= new CampeonatoModel($_REQUEST['nombre'],$_REQUEST['fechaFinIns'], $_REQUEST['categoria'], $_REQUEST['genero'], $_REQUEST['estado']);
		$respuesta = $modelo->DELETE();
		new MessageView($respuesta,'./Campeonato_Controller.php');
	}
    break;

  default:
	if (!$_POST){
		$modelo = new CampeonatoModel(' ' ,' ' ,' ', ' ', ' ');
	}

	$contenido = $modelo->showAll();
	$lista = array('nombre', 'fechaFinIns', 'categoria', 'genero', 'estado');

	new CampeonatoShowallView($lista, $contenido);
}



 ?>
