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

  function DELETE()
		{
		   $sql = "SELECT * FROM campeonato  WHERE
		   (nombre = '$this->nombre')";

		    $result = $this->mysqli->query($sql);

		    if ($result->num_rows == 1)
		    {

		       $sql = "DELETE FROM campeonato  WHERE
		       (nombre = '$this->nombre')";

		        $this->mysqli->query($sql);

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

    function showCampeonatos(){
      $sql = "SELECT * FROM partidocamp WHERE (nombreCamp = '$this->nombreCamp')";
      $resultado = $this->mysqli->query($sql);
      return $resultado;
    }

    function crearGrupo(){

      $sql = "SELECT COUNT(nombre) FROM partcampeonatos WHERE (nombre = '$this->nombre')";
      $resultado = $this->mysqli->query($sql);
      $grupo = 1;
      if($resultado < 8){
          return "No se puede crear, no hay suficientes";
      }else{
        while(!$resultado == 0){
          if ($resultado >= 12) {
            $sql = "SELECT FIRST(12) FROM partcampeonatos WHERE (nombre = '$this->nombre')";
            $resultado12 = $this->mysqli->query($sql);
            $arrayresultado = $resultado12->fetch_array();
            foreach ($arrayresultado as $variable) {
              $m1 = $variable['miembro1'];
              $m2 = $variable['miembro2'];
              $nm = $variable['nombreCamp'];
              $sql = "INSERT INTO clasificacion VALUES('$m1','$m2','$nm','$grupo',0)";
              $resultadoinsert = $this->mysqli->query($sql);
              $sql2 = "DELETE FROM partcampeonatos WHERE('$m1','$m2','$nm')";
              $resultadodelete = $this->mysqli->query($sql2);
            }
            $resultado = $resultado - 12;
            $grupo = $grupo + 1;
          }else if ($resultado == 11){

          }else if ($resultado == 10) {

          }else if ($resultado == 9) {

          }else if($resultado == 8){

          }else{
            $sql = "SELECT FROM partcampeonatos WHERE (nombreCamp = '$this->nombreCamp')";
            $resultado12 = $this->mysqli->query($sql);
            $arrayresultado = $resultado12->fetch_array();
            foreach ($arrayresultado as $variable) {
              $sql = "INSERT INTO clasificacion VALUES($m1,$m2,$nm,$grupo,0)";
              $resultadoinsert = $this->mysqli->query($sql);
              $sql2 = "DELETE FROM partcampeonatos WHERE($m1,$m2,$nm)";
              $resultadodelete = $this->mysqli->query($sql2);
            }
            $resultado = 0;
          }
        }


      }
    }


}



 ?>
