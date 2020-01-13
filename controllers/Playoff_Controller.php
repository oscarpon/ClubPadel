<?php

session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Playoff_Showall_View.php';
include '../views/PlayoffCamp_Showall_View.php';
include '../models/Playoff_Model.php';
include '../models/Campeonato_Model.php';
include '../views/Playoff_Edit_View.php';
include '../views/Message_View.php';

switch ($_REQUEST['action']) {
  case 'EDIT':
      if (!$_POST) {
        $Playoff = new PlayoffModel($_REQUEST['idPlayoff'],'', '', '', '', '', $_REQUEST['resultado']);
        $valores= $Playoff ->RellenaDatos();
        new PlayoffEditView($valores);
      }
      else{
        $Playoff = new PlayoffModel($_REQUEST['idPlayoff'], $_REQUEST['miembro1Par1'], $_REQUEST['miembro2Par1'], $_REQUEST['miembro1Par2'], $_REQUEST['miembro2Par2'], $_REQUEST['nombreCamp'], $_REQUEST['resultado']);
        $respuesta = $Playoff->EDIT();
        new MessageView($respuesta, './Playoff_Controller.php');
      }

      break;

  case 'generarPlayoffs':
      $modelo = new PlayoffModel('', '', '', '', '', $_REQUEST['nombreCamp'], '');
      $respuesta = $modelo -> generarPlayoffs();
			echo '<p>';
			print_r($respuesta);
			echo '</p>';
      new MessageView("A",'./Playoff_Controller.php');
    break;

	case 'verPlayoffs':
		$modelo = new PlayoffModel('', '', '', '', '', $_REQUEST['nombreCamp'], '');
		$datos = $modelo -> SEARCH();
		new PlayoffShowallView($datos);
	break;

  default:
  	$modelo = new CampeonatoModel('' ,'' ,'', '', '');
  	$datos = $modelo->SEARCH();
  	new PlayoffCampShowallView($datos);
}



 ?>
