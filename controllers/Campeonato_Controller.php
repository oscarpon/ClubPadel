<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Campeonato_Showall_View.php';
include '../views/Campeonato_Add_View.php';
include '../models/Campeonato_Model.php';
include '../views/Campeonato_Delete_View.php';
include '../views/Campeonato_ShowCurrent_View.php';
include '../views/Message_View.php';
include '../models/PartidoCamp_Model.php';
include '../models/Liga_Model.php';


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
			$modelo = new CampeonatoModel ($_REQUEST['nombre'], '', '', '', '');
			$respuesta = $modelo -> crearGrupo() ;
			new MessageView($respuesta, './Campeonato_Controller.php');

		break;
	case 'verGrupos':
		$modelo = new LigaModel('','',$_REQUEST['nombre'],'','');
		$datos = $modelo->showCurrent();
		new CampeonatoShowCurrentView($datos);
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
