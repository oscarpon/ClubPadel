<?php

/**
 *
 */
class PartidoCampModel
{

  var $codigoPista;
  var $fecha;
  var $miembro1Par1;
  var $miembro2Par1;
  var $miembro1Par2;
  var $miembro2Par2;
  var $nombreCamp;
  var $resultado;

  function __construct($codigoPista, $fecha, $miembro1Par1, $miembro2Par1, $miembro1Par2, $miembro2Par2, $nombreCamp, $resultado)
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

  function ADD(){

        $sql = "SELECT * FROM partidocamp WHERE (codigoPista = '$this->codigoPista' AND fecha = '$this->fecha')";
		if (!$result = $this->mysqli->query($sql)){
			return 'No se ha podido conectar con la base de datos';
		}
		else {
			if ($result->num_rows == 0){

				$sql = "INSERT INTO partidocamp (
					caodigoPista,
					fecha,
					miembro1Par1,
					miembro2Par1,
					miembro1Par2,
					miembro2Par2,
					nombreCamp,
					resultado
					)
						VALUES (
						'$this->codigoPista',
						'$this->fecha',
						'$this->miembro1Par1',
						'$this->miembro2Par1',
						'$this->miembro1Par2',
						'$this->miembro2Par2',
						'$this->nombreCamp',
						'$this->result'
						)";


				if (!$this->mysqli->query($sql)) {
					return 'Error en la inserción';
				}
				else{
					return 'Inserción realizada con éxito';
				}

			}
			else
				return 'Ya existe en la base de datos';
		}
  }

    function RellenaDatos(){
      $sql = "SELECT * FROM partidocamp WHERE (codigoPista='$this->codigoPista' AND fecha='$this->fecha' AND nombreCamp='$this->nombreCamp')";
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

    function showAll(){
      $sql = "SELECT * FROM partidocamp WHERE nombreCamp='$this->nombreCamp'";
      $resultado = $this->mysqli->query($sql);
      return $resultado;
    }

  function EDIT(){
  	$sql = "SELECT * FROM partidocamp  WHERE (codigoPista='$this->codigoPista' AND fecha='$this->fecha' AND nombreCamp='$this->nombreCamp') ";

      $result = $this->mysqli->query($sql);

      if ($result->num_rows == 1)

      {

  		$sql = "UPDATE partidocamp SET
  				codigoPista = '$this->codigoPista',
  				fecha = '$this->fecha',
  				miembro1Par1 = '$this->miembro1Par1',
  				miembro2Par1 = '$this->miembro2Par1',
  				miembro1Par2 = '$this->miembro1Par2',
  				miembro2Par2 = '$this->miembro2Par2',
          nombreCamp = '$this->nombreCamp',
          resultado = '$this->resultado'


  				WHERE ( codigoPista='$this->codigoPista' AND fecha='$this->fecha' AND nombreCamp='$this->nombreCamp')";
          if (!($resultado = $this->mysqli->query($sql))){
  			       return 'Error en la modificación';
  		    }
      		else{
      			return 'Modificado correctamente';
      		}
      }
      else{
      	return 'No existe en la base de datos';
      }
  }

}



 ?>
