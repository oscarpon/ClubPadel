<?php

/**
 *
 */
class CampeonatoModel
{

  var $nombre;
  var $fechaFinIns;
  var $categoria;
  var $genero;
  var $estado;

  function __construct($nombre, $fechaFinIns, $categoria, $genero, $estado)
  {
    $this->nombre = $nombre;
    $this->fechaFinIns = $fechaFinIns;
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
          nombre,
					fechaFinIns,
					categoria,
					genero,
					estado
					)
						VALUES (
            '$this->nombre',
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
    function SEARCH(){
      $sql="SELECT nombre, fechaFinIns, categoria, genero, estado
        from CAMPEONATO
        where ((BINARY nombre LIKE '%$this->nombre%')
        && (BINARY fechaFinIns LIKE '%$this->fechaFinIns%')
        && (BINARY categoria LIKE '%$this->categoria%')
        && (BINARY genero LIKE '%$this->genero%')
        && (BINARY estado LIKE '%$this->estado%'))";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function RellenaDatos(){
      $sql = "SELECT * FROM CAMPEONATO WHERE (nombre = '$this->nombre')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

    function showAll(){
      $sql = "SELECT * FROM campeonato";
  		$resultado = $this->mysqli->query($sql);
  		return $resultado;
    }
}



 ?>
