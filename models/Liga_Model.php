<?php

/**
 *
 */
class LigaModel
{

  var $miembro1;
  var $miembro2;
  var $nombreCamp;
  var $grupo;
  var $puntos;

  function __construct($miembro1, $miembro2, $nombreCamp, $grupo, $puntos)
  {
    $this->miembro1 = $miembro1;
    $this->miembro2 = $miembro2;
    $this->nombreCamp = $nombreCamp;
    $this->grupo = $grupo;
    $this->puntos = $puntos;

    include_once '../functions/BdAdmin.php';
    $this->mysqli = ConectarBD();

  }

  function DELETE()
		{
		   $sql = "SELECT * FROM clasificacion  WHERE
		   (miembro1 = '$this->miembro1')";

		    $result = $this->mysqli->query($sql);

		    if ($result->num_rows == 1)
		    {

		       $sql = "DELETE FROM clasificacion  WHERE
		       (miembro1 = '$this->miembro1')";

		        $this->mysqli->query($sql);

		    	return "Eliminado correctamente";
		    }
		    else
		        return "No se encuentra la pareja";
		}
  /*  function SEARCH(){
      $sql="SELECT miembro1, miembro2, nombreCamp, grupo, estado
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
    }*/
    function RellenaDatos(){
      $sql = "SELECT * FROM clasificacion WHERE (miembro1 = '$this->miembro1')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

    function showAll(){
      $sql = "SELECT * FROM clasificacion ORDER BY puntos";
  		$resultado = $this->mysqli->query($sql);
  		return $resultado;
    }

    function EDIT(){
	$sql = "SELECT * FROM clasificacion  WHERE (miembro1 = '$this->miembro1' AND miembro2 = '$this->miembro2') ";

    $result = $this->mysqli->query($sql);

    if ($result->num_rows == 1)

    {

		$sql = "UPDATE clasificacion  SET
				miembro1 = '$this->miembro1',
				miembro2 = '$this->miembro2',
				nombreCamp = '$this->nombreCamp',
				grupo = '$this->grupo',
				puntos = '$this->puntos'

				WHERE ( miembro1 = '$this->miembro1' AND miembro2 = '$this->miembro2')";
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
