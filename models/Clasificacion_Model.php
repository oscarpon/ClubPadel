<?php

/**
 *
 */
class ClasificacionModel()
{

  var $codPista;
  var $fecha;
  var $miembro1Par1;
  var $miembro2Par1;
  var $miembro1Par2;
  var $miembro2Par2;
  var $nombreCamp;
  var $resultado;

  function __construct($codPista, $fecha, $miembro1Par1, $miembro2Par1, $miembro1Par2, $miembro2Par2, $nombreCamp, $resultado)
  {
    $this->codPista = $codPista;
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
		if (!$result = $this->mysqli->query($sql)){
			return 'No se ha podido conectar con la base de datos';
		}
		else {
			if ($result->num_rows == 0){

				$sql = "INSERT INTO partidocamp (
					codPista,
					fecha,
					miembro1Par1,
					miembro2Par1,
					miembro1Par2,
          miembro2Par2,
          nombreCamp,
          resultado
					)
						VALUES (
						'$this->codPista',
						'$this->fecha',
						'$this->miembro1Par1',
						'$this->miembro2Par1',
						'$this->miembro1Par2',
						'$this->miembro2Par2',
            '$this->nombreCamp',
            '$this->resultado'
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

    else{

        return 'Introduzca un valor';

	}
	}
}
function EDIT(){
	$sql = "SELECT * FROM partidocamp  WHERE (miembro1Par1 = '$this->miembro1Par1') ";

    $result = $this->bd->query($sql);

    if ($result->num_rows == 1)

    {

		$sql = "UPDATE partidocamp  SET
				codPista = '$this->codPista',
				fecha = '$this->fecha',
				miembro1Par1 = '$this->miembro1Par1',
				miembro2Par1 = '$this->miembro2Par1',
				miembro1Par2 = '$this->miembro1Par2',
				miembro2Par2 = '$this->miembro2Par2',
        nombreCamp = '$this->nombreCamp',
        resultado = '$this->resultado'


				WHERE ( miembro1Par1 = '$this->miembro1Par1')";
        if (!($resultado = $this->bd->query($sql))){
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
