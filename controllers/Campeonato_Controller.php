<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Campeonato_Showall_View.php';
include '../views/Campeonato_Add_View.php';
include '../models/Campeonato_Model.php';
include '../views/Campeonato_Delete_View.php';
include '../views/Message_View.php';
include '../controllers/Grupo_Controller.php';
include '../models/Grupos_Model.php';


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

		case 'generarGrupos':

		if(!$_POST){

			$arrayAscendiente = getGruposAsc($_REQUEST['nombre'], $_REQUEST['categoria'], $_REQUEST['genero']);
			$arrayDescendiente = getGruposDes($_REQUEST['nombre'], $_REQUEST['categoria'], $_REQUEST['genero']);
			$array1 = array();
			$array2 = array();
			if(!comprobarSiExisteEnfrentamiento($_REQUEST['id_campeonato'], $_REQUEST['nivel'], $_REQUEST['categoria'])){
			while($array1 = $arrayAscendiente->fetch_assoc()){
			while($array2 = $arrayAscendiente->fetch_assoc()){
			$modelo = new GruposModel($_REQUEST['codigoPista'],$_REQUEST['fecha'],$array1['miembro1Par1'],$array1['miembro1Par2'],$array2['miembro2Par1'],$array2['miembro2Par2'],$_REQUEST['nombreCamp'],'');
			$respuesta = $modelo->ADD();

			break;
				}

			}
		}
		else{
			$modelo = new GruposModel('','','','','','','','');
			$resultado = $modelo->SEARCHCLASHBYCATNIV($_REQUEST['id_campeonato'], $_REQUEST['nivel'], $_REQUEST['categoria']);
			$datos = array();
			new CampeonatoCurrentView($datos, $resultado);
		}
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
