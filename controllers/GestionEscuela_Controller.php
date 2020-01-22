<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/EscuelaDeportiva_Showall_View.php';
include '../views/EscuelaDeportiva_Add_View.php';
include '../models/EscuelaDeportiva_Model.php';
include '../views/EscuelaDeportiva_Delete_View.php';
include '../views/Campeonato_ShowCurrent_View.php';
include '../views/Message_View.php';
include '../models/Liga_Model.php';
include '../models/PartidoCamp_Model.php';
include '../views/PartidoCamp_Showall_View.php';
include '../models/InscripcionEscuela_Model.php';

function get_data(){
	$nombre = $_REQUEST['nombre'];
	$horario ='';
	$entrenador ='';
	$codigoPista = '' ;
	$periodicidad='';
	$minInscritos='';
	$maxInscritos='';
	$estado='';
	$action = $_REQUEST['action'];
	$escuelasdeportivas = new EscuelaDeportivaModel(
		$nombre,
		$horario,
		$entrenador,
		$codigoPista,
		$periodicidad,
		$minInscritos,
		$maxInscritos,
		$estado,
		$action
	);
	return $escuelasdeportivas;
}

switch ($_REQUEST['action']) {
  case 'ADD':
    	if (!$_POST) {
    		new EscuelaDeportivaAddView();
    	}
			else{
				$fechaActual = date("Y-m-d H:i:s");
		    $hora = new DateTime();
		    $fecha = new DateTime();
		    $fecha = $_REQUEST['horario'];
		    $horaString = $hora->format('H:i:s');
		    $merge = date($fecha .' ' .$horaString);

				$sql = new EscuelaDeportivaModel($_REQUEST['nombre'], $_REQUEST['horario'],$_REQUEST['entrenador'], $_REQUEST['codigoPista'], $_REQUEST['periodicidad'], $_REQUEST['minInscritos'], $_REQUEST['maxInscritos'], $_REQUEST['estado']);
				$result = $sql->añadirEscuela($merge);
				$INSESC = new InscripcionEscuelaModel($_REQUEST['nombre'], $_REQUEST['horario'],$_REQUEST['entrenador']);
				$INSESC->ADD2($merge);
				new MessageView($result,'./GestionEscuela_Controller.php');

			}
    break;

  case 'DELETE':
	if (!$_POST) {
		$modelo= new EscuelaDeportivaModel($_REQUEST['nombre'],'', '', '', '', '', '', '');
		$datos= $modelo ->RellenaDatos();
		new EscuelaDeportivaDeleteView($datos);
	}
	else{
		$modelo= new EscuelaDeportivaModel($_REQUEST['nombre'], $_REQUEST['horario'],$_REQUEST['entrenador'], $_REQUEST['codigoPista'], $_REQUEST['periodicidad'], $_REQUEST['minInscritos'], $_REQUEST['maxInscritos'], $_REQUEST['estado']);
		$respuesta = $modelo->DELETE();
		new MessageView($respuesta,'./GestionEscuela_Controller.php');
	}
    break;

	case 'verEscuelas':
		$modelo = new EscuelaDeportivaModel($_REQUEST['nombre'],'', '', '', '', '', '', '');
		$datos = $modelo -> showAll();
		new EscuelaDeportivaShowallView($datos);
	break;

  default:
	if (!$_POST){
		$modelo = new EscuelaDeportivaModel(' ' ,' ' ,' ', ' ', ' ', ' ', ' ', ' ');
	}

	$contenido = $modelo->showAll();
	$lista = array('nombre', 'horario', 'entrenador', 'codigoPista', 'periodicidad', 'minInscritos', 'maxInscritos', 'estado');

	new EscuelaDeportivaShowallView($lista, $contenido);
}



 ?>
