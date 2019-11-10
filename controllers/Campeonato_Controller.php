<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Campeonato_Showall_View.php';
include '../views/Campeonato_Add_View.php';
include '../models/Campeonato_Model.php';


function get_data(){
	$nombre = $_REQUEST['nombre'];
	$fechaFinIns ='';
	$categoria ='';
	$genero = '' ;
	$estado='';
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
  case 'añadir':
    	if (!$_POST) {
    		new CampeonatoAddView();
    	}
			else{
				include '../models/Campeonato_Model.php';
				$sql = new CampeonatoModel($_REQUEST['nombre'], $_REQUEST['fechaFinIns'],$_REQUEST['categoria'], $_REQUEST['genero'], $_REQUEST['estado']);
				$result = $sql->añadirCampeonato();
					new MessageView($result,'./Campeonato_Controller.php');
			}
    break;

  case 'borrar':
    // code...
    break;

  default:
	if (!$_POST){
		include_once '../models/Campeonato_Model.php';
		$modelo = new CampeonatoModel(' ' ,' ' ,' ', ' ', ' ');
	}
	else{
			include_once '../models/Campeonato_Model.php';
	}
	$contenido = $modelo->showAll();
	$lista = array('nombre', 'fechaFinIns', 'categoria', 'genero', 'estado');

	new CampeonatoShowallView($lista, $contenido);
}



 ?>
