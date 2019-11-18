<?php
session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Noticias_Add_View.php';
include '../views/Noticias_Showall_View.php';
include '../models/Noticia_Model.php';
include '../views/Message_View.php';
include '../views/Principal_View.php';
include '../views/Noticias_Delete_View.php';

function get_data(){
	$idContenido = $_REQUEST['idContenido'];
	$titulo ='';
	$descripcion = '';
	$email = '';
	$action = $_REQUEST['action'];
	$NEW = new NoticiaModel(
		$idContenido,
		$titulo,
		$descripcion,
		$email
	);
	return $NEW;
}
Switch ($_REQUEST['action']){

		case 'ADD':
				if (!$_POST){
					new NoticiasAddView();

				}
				else{
				  $modelo= new NoticiaModel($_REQUEST['idContenido'],$_REQUEST['titulo'], $_REQUEST['descripcion'],$_SESSION['email']);
					$respuesta = $modelo->insertarNoticia();
					new MessageView($respuesta,'./Noticias_Controller.php');

				}
				break;

		case 'SEARCH':
				if(!$_POST){
					new SEARCH_VIEW();
				}
				else{
					$modelo= new NoticiaModel($_REQUEST['id_noticia'],$_REQUEST['titulo'], $_REQUEST['descripcion'],$_SESSION['email']);

                     $respuesta = $modelo->SEARCH();
					$lista = array('Código', 'Titulo ', 'Descripcion ');
					new NoticiasShowallView($lista, $respuesta);

				}
		       break;

		case 'EDIT':
				if (!$_POST) {
					$modelo= new NoticiaModel($_REQUEST['idContenido'],'', '', '','');
					$valores= $modelo ->RellenaDatos();
					new Noticias_Edit($valores);
				}
				else{
					$modelo = new NoticiaModel($_REQUEST['idContenido'],$_REQUEST['titulo'], $_REQUEST['descripcion'],$_SESSION['email']);
					$respuesta = $modelo->EDIT();
					new MessageView($respuesta, './Noticias_Controller.php');
				}

				break;
		case 'DELETE':
				if (!$_POST) {
					$modelo= new NoticiaModel($_REQUEST['idContenido'],'', '', '');
					$datos= $modelo ->RellenaDatos();
					new NoticiasDeleteView($datos);
				}
				else{
					$modelo= new NoticiaModel($_REQUEST['idContenido'],$_REQUEST['titulo'], $_REQUEST['descripcion'],$_SESSION['email']);
					$respuesta = $modelo->eliminarNoticia();
					new MessageView($respuesta,'./Noticias_Controller.php');
				}

					break;

		case 'PagPrincipal':
			$modelo = new NoticiaModel('' ,'' ,'', $_SESSION['email']);
			$contenido = $modelo->showAll();
			$lista = array('  Código  ', '  Titulo  ', '  Descripcion  ');

			new PrincipalView($lista,$contenido);
			break;

		 default:
				$modelo = new NoticiaModel('' ,'' ,'', '');
				$contenido = $modelo->showAll();
				$lista = array('  Código  ', '  Titulo  ', '  Descripcion  ');

				new NoticiasShowallView($lista,$contenido);
				break;
}
 ?>
