<?php
session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Noticias_Add_View.php';
include '../views/Noticias_Showall_View.php';
include '../models/Noticia_Model.php';
include '../views/Message_View.php';
include '../views/Noticias_Delete_View.php';

function get_data(){
	$idContenido = $_REQUEST['idContenido'];
	$titulo ='';
	$descripcion = '';
	$action = $_REQUEST['action'];
	$NEW = new NoticiaModel(
		$idContenido,
		$titulo,
		$descripcion,
		$action
	);
	return $NEW;
}
Switch ($_REQUEST['action']){

		case 'ADD':
				if (!$_POST){
					include_once '../models/Noticia_Model.php';
					new NoticiasAddView();

				}
				else{
				 include_once '../models/Noticia_Model.php';
				  $modelo= new NoticiaModel($_REQUEST['idContenido'],$_REQUEST['titulo'], $_REQUEST['descripcion']);
					$respuesta = $modelo->insertarNoticia();
					new MessageView($respuesta,'./Noticias_Controller.php');

				}
				break;

		case 'SEARCH':
				if(!$_POST){
					new SEARCH_VIEW();
				}
				else{
					 include_once '../models/Noticia_Model.php';
					$modelo= new NoticiaModel($_REQUEST['id_noticia'],$_REQUEST['titulo'], $_REQUEST['descripcion']);

                     $respuesta = $modelo->SEARCH();
					$lista = array('Código', 'Titulo ', 'Descripcion ');
					new NoticiasShowallView($lista, $respuesta);

				}
		       break;

		case 'EDIT':
				if (!$_POST) {
					 include_once '../models/Noticia_Model.php';
					$modelo= new NoticiaModel($_REQUEST['idContenido'],'', '', '');
					$valores= $modelo ->RellenaDatos();
					new Noticias_Edit($valores);
				}
				else{
					 include '../models/Noticia_Model.php';
					$modelo = new NoticiaModel($_REQUEST['idContenido'],$_REQUEST['titulo'], $_REQUEST['descripcion']);
					$respuesta = $modelo->EDIT();
					new MessageView($respuesta, './Noticias_Controller.php');
				}

				break;
		case 'DELETE':
				if (!$_POST) {
					 include_once '../models/Noticia_Model.php';
					$modelo= new NoticiaModel($_REQUEST['idContenido'],'', '');
					$datos= $modelo ->eliminarNoticia();
					new NoticiasDeleteView($datos);
				}
				else{
					include_once '../models/Noticia_Model.php';
					$modelo= new NoticiaModel($_REQUEST['idContenido'],$_REQUEST['titulo'], $_REQUEST['descripcion']);
					$respuesta = $modelo->eliminarNoticia();
					new MessageView($respuesta,'./Noticias_Controller.php');
				}

					break;
		case 'SHOWCURRENT':
				 include_once '../models/Noticia_Model.php';
			    $modelo = new NoticiaModel($_REQUEST['id_noticia'],'','','');
				$valores = $modelo->RellenaDatos();
				new SHOWCURRENT_VIEW($valores);
				break;
		 default:
				if (!$_POST){
					include_once '../models/Noticia_Model.php';
					$modelo = new NoticiaModel(' ' ,' ' ,' ', ' ', ' ');
				}
				else{
					  include_once '../models/Noticia_Model.php';
				}
				$contenido = $modelo->showAll();
				$lista = array('  Código  ', '  Titulo  ', '  Descripcion  ');

				new NoticiasShowallView($lista,$contenido);

}
 ?>
