<?php
session_start();

if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include '../views/Noticias_Add.php';
include '../views/Noticias_Showall.php';
include '../models/Noticia_Model.php';
include '../views/Message_View.php';

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
					//$modelo = new NoticiaModel('','','','');
					//$valor = $modelo->generarCodigo(8);
					new Noticias_Add();

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
					new Noticias_Showall($lista, $respuesta);

				}
		       break;

		case 'EDIT':
				if (!$_POST) {
					 include_once '../models/Noticia_Model.php';
					$modelo= new NoticiaModel($_REQUEST['id_noticia'],'', '', '');
					$valores= $modelo ->RellenaDatos();
					new Noticias_Edit($valores);
				}
				else{
					 include '../models/Noticia_Model.php';
					$modelo = new NoticiaModel($_REQUEST['id_noticia'],$_REQUEST['titulo'], $_REQUEST['descripcion']);
					$respuesta = $modelo->EDIT();
					new MessageView($respuesta, './Noticias_Controller.php');
				}

				break;
		case 'DELETE':
				if (!$_POST) {
					 include_once '../models/Noticia_Model.php';
					$modelo= new NoticiaModel($_REQUEST['id_noticia'],'', '', '');
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW($valores);
				}
				else{
					 include_once '../models/Noticia_Model.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MessageView($respuesta,'./Post_Controller.php');
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

				new Noticias_Showall($lista,$contenido);

}
 ?>
