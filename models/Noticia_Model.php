<?php

class NoticiaModel{

	var $idContenido;
	var $titulo;
	var $descripcion;

	/*******/

	function __construct($idContenido,$titulo,$descripcion){
		$this->idContenido = $idContenido;
		$this->titulo = $titulo;
		$this->descripcion = $descripcion;
    include_once '../functions/BdAdmin.php';
    $this->mysqli=ConectarBD();
	}

	function showAll(){
		$sql = "SELECT * FROM contenido";
		$resultado = $this->mysqli->query($sql);
		return $resultado;
	}

	function insertarNoticia(){
		$sql = "INSERT INTO contenido(idContenido,titulo,descripcion) VALUES('$this->idContenido',
			'$this->titulo', '$this->descripcion')";
		$resultado = $this->mysqli->query($sql);
		if(!$resultado) return "No se ha insertado";
		else return "Inserción OK";


	}

	function eliminarNoticia(){
		$sql = "SELECT * FROM contenido  WHERE
		   (idContenido = '$this->idContenido')";

		    $result = $this->mysqli->query($sql);

		    if ($result->num_rows > 0)
		    {

		       $sql = "DELETE FROM contenido WHERE
		       (idContenido = '$this->idContenido')";

		        $this->mysqli->query($sql);

		    	return "Borrado correctamente";
		    }
		    else
		        return "No existe";
	}

}
?>
