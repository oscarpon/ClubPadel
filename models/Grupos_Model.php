<?php

/**
 *
 */
class CampeonatoModel
{

  var $codigoPista;
  var $fecha;
  var $miembro1Par1;
  var $miembro2Par1;
  var $miembro1Par2;
  var $miembro2Par2;
  var $nombreCamp;
  var $resultado;

  function __construct($codigoPista, $fecha, $miembro1Par1, $miembro2Par1, $miembro2Par1, $miembro2Par2, $nombreCamp, $resultado)
  {
    $this->codigoPista = $codigoPista;
    $this->fecha = $fecha;
    $this->miembro1Par1 = $miembro1Par1;
    $this->miembro2Par1 = $miembro2Par1;
    $this->miembro1Par2 = $miembro1Par2;
    $this->miembro2Par2 = $miembro2Par2;
    $this->nombreCamp = $nombreCamp;
    $this->resultado = $resultado;

    include_once '../functions/BdAdmin.php';
    $this->mysqli = ConectarBD();

  }

    function RellenaDatos(){
      $sql = "SELECT * FROM partidocamp WHERE (nombreCamp = '$this->nombreCamp')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }


    function showCampeonatos(){
      $sql = "SELECT * FROM partidocamp WHERE (nombreCamp = '$this->nombreCamp')";
      $resultado = $this->mysqli->query($sql);
      return $resultado;
    }

}



 ?>
