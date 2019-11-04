<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Campeonato_Showall.php';


function get_data(){
	$nombre = $_REQUEST['nombre'];
	$FechaFinIns ='';
	$categoria ='';
	$genero = '' ;
	$estado='';
	$action = $_REQUEST['action'];
	$campeonato = new CampeonatoModel(
		$nombre,
		$FechaFinIns,
		$categoria,
		$genero,
		$estado,
		$action
	);
	return $campeonato;
}

switch ($_REQUEST['action']) {
  case 'añadir':
    // code...
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
			$datos = $modelo->SEARCH();
			$array = array('Identificador de Pista','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa', 'ID Grupo');

			new CampeonatoShowall($lista, $datos);
	}
}


 ?>
