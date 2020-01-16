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
include '../models/Liga_Model.php';
include '../models/PartidoCamp_Model.php';
include '../views/PartidoCamp_Showall_View.php';
include '../views/PartidoCamp_Edit_View.php';

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
				$categorias = [];
				$generos = [];
				if(isset($_POST['principiante'])){
						$categorias[] = $_REQUEST['principiante'];
				}
				if(isset($_POST['medio'])){
						$categorias[] = $_REQUEST['medio'];
				}
				if(isset($_POST['profesional'])){
						$categorias[] = $_REQUEST['profesional'];
				}
				if(isset($_POST['masculino'])){
						$generos[] = $_REQUEST['masculino'];
				}
				if(isset($_POST['femenino'])){
						$generos[] = $_REQUEST['femenino'];
				}
				if(isset($_POST['mixto'])){
						$generos[] = $_REQUEST['mixto'];
				}
				$sql = new CampeonatoModel($_REQUEST['nombre'], $_REQUEST['fechaFinIns'],'','', $_REQUEST['estado']);
				$result = $sql->añadirCampeonato($categorias,$generos);
				new MessageView($result,'./Campeonato_Controller.php');
			}
    break;

	case 'EDIT':
      if (!$_POST) {
        $partidocamp = new PartidoCampModel($_REQUEST['codigoPista'],$_REQUEST['fecha'], $_REQUEST['miembro1Par1'], $_REQUEST['miembro2Par1'], $_REQUEST['miembro1Par2'], $_REQUEST['miembro2Par2'], $_REQUEST['nombreCamp'], $_REQUEST['resultado']);
        $valores= $partidocamp ->RellenaDatos();
        new PartidoCampEditView($valores);
      }
      else{
        $partidocamp = new PartidoCampModel($_REQUEST['codigoPista'],$_REQUEST['fecha'], $_REQUEST['miembro1Par1'], $_REQUEST['miembro2Par1'], $_REQUEST['miembro1Par2'], $_REQUEST['miembro2Par2'], $_REQUEST['nombreCamp'], $_REQUEST['resultado']);
        $respuesta = $partidocamp->EDIT($partidocamp);
        new MessageView($respuesta, './Campeonato_Controller.php');
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

	case 'generarPartidos':
		$modelo = new CampeonatoModel($_REQUEST['nombre'], '', '', '', '');
		$modelo -> generarPartidos();
		new MessageView('Partidos generados.','./Campeonato_Model.php');
	break;

	case 'verPartidos':
		$modelo = new PartidoCampModel('','','','','','', $_REQUEST['nombre'],'');
		$datos = $modelo -> showCampeonatos();
		new PartidoCampShowallView($datos);
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
