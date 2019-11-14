<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Liga_Showall_View.php';
include '../models/Liga_Model.php';
include '../views/Liga_Delete_View.php';
include '../views/Liga_Edit_View.php';
include '../views/Message_View.php';


function get_data(){
	$miembro1 = $_REQUEST['miembro1'];
	$miembro2 = $_REQUEST['miembro2'];
	$nombreCamp = $_REQUEST['nombreCamp'];
	$grupo = '' ;
	$puntos='';
	$action = $_REQUEST['action'];
	$campeonato = new LigaModel(
		$miembro1,
		$miembro2,
		$nombreCamp,
		$grupo,
		$puntos,
		$action
	);
	return $campeonato;
}

switch ($_REQUEST['action']) {
  case 'ADD':
    	if (!$_POST) {
    		new LigaAddView();
    	}
			else{

				$sql = new LigaModel($_REQUEST['miembro1'], $_REQUEST['miembro2'],$_REQUEST['nombreCamp'], $_REQUEST['grupo'], $_REQUEST['puntos']);
				$result = $sql->ADD();
					new MessageView($result,'./Liga_Controller.php');
			}
    break;

  case 'DELETE':
	if (!$_POST) {
		$modelo= new LigaModel($_REQUEST['miembro1'],$_REQUEST['miembro2'], $_REQUEST['nombreCamp'], '', '');
		$datos= $modelo ->RellenaDatos();
		new LigaDeleteView($datos);
	}
	else{
		$modelo= new LigaModel($_REQUEST['miembro1'],$_REQUEST['miembro2'], $_REQUEST['nombreCamp'], $_REQUEST['grupo'], $_REQUEST['puntos']);
		$respuesta = $modelo->DELETE();
		new MessageView($respuesta,'./Liga_Controller.php');
	}
    break;

		case 'EDIT':
				if (!$_POST) {

					$modelo= get_data();
				  $valores= $modelo ->RellenaDatos();
					new LigaEditView($valores);
				}
				else{
					$modelo = new LigaModel($_REQUEST['miembro1'],$_REQUEST['miembro2'], $_REQUEST['nombreCamp'],$_REQUEST['grupo'],$_REQUEST['puntos']);
					$respuesta = $modelo->EDIT();
					new MessageView($respuesta, './Liga_Controller.php');
				}

				break;

  default:
	if (!$_POST){
		$modelo = new LigaModel(' ' ,' ' ,' ', ' ', ' ');
	}

	$contenido = $modelo->showAll();
	$lista = array('miembro1', 'miembro2', 'nombreCamp', 'grupo', 'puntos');

	new LigaShowallView($lista, $contenido);
}



 ?>
