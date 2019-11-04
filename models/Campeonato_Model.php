<?php

/**
 *
 */
class CampeonatoModel
{

  var $nombre;
  var $FechaFinIns;
  var $categoria;
  var $genero;
  var $estado;

  function __construct($nombre, $FechaFinIns, $categoria, $genero, $estado)
  {
    $this->nombre = $nombre;
    $this->fechaFinIns = $FechaFinIns;
    $this->categoria = $categoria;
    $this->genero = $genero;
    $this->estado = $estado;

    include_once '../functions/BdAdmin.php';
    $this->mysqli = ConectarBD();

  }

  function añadirCampeonato(){
    if (($this->nombre <> '')){
        $sql = "SELECT * FROM campeonato WHERE (nombre = '$this->nombre')";
		if (!$result = $this->mysqli->query($sql)){
			return 'Imposible ConectarBD';
		}
		else {
			if ($result->num_rows == 0){

				$sql = "INSERT INTO campeonato (
					fechaFinIns,
					categoria,
					genero,
					estado
					)
						VALUES (
						'$this->fechaFinIns',
						'$this->categoria',
						'$this->genero',
						'$this->estado'
						)";


				if (!$this->mysqli->query($sql)) {
					return 'Error';
				}
				else{
					return 'Campeonato añadido correctamente';
				}

			}
			else
				return 'Campeonato ya existe';
		}
    }

  }

  function eliminarCampeonato()
		{
		   $sql = "SELECT * FROM campeonato  WHERE
		   (nombre = '$this->nombre')";

		    $result = $this->mysqli->query($sql);

		    if ($result->num_rows == 1)
		    {

		       $sql = "DELETE FROM campeonato  WHERE
		       (campeonato = '$this->campeonato')";

		        $this->bd->query($sql);

		    	return "Eliminado correctamente";
		    }
		    else
		        return "No se encuentra el campeonato";
		}
}



 ?>
