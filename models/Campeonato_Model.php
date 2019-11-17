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

      $sql = "SELECT * FROM partcampeonatos WHERE (nombreCamp = '$this->nombre')";
      $resultado = $this->mysqli->query($sql);
      $grupo = 1;
      $lineas = $resultado->num_rows;
      if($lineas < 8){
          return "No se puede crear, no hay suficientes";
      }else{
        while(!$lineas == 0){
          if ($lineas >= 12) {
            $sql = "SELECT * FROM partcampeonatos WHERE (nombreCamp = '$this->nombre') LIMIT 12";
            $resultado12 = $this->mysqli->query($sql);
            $arrayresultado = mysqli_fetch_row($resultado12);
            for ($i = 0; $i < $lineas;$i++) {
              $m1 = $arrayresultado[0];
              $m2 = $arrayresultado[1];
              $nm = $arrayresultado[2];
              $sql = "INSERT INTO clasificacion VALUES('$m1','$m2','$nm','$grupo',0)";
              $resultadoinsert = $this->mysqli->query($sql);
              $sql2 = "DELETE FROM partcampeonatos WHERE('$m1','$m2','$nm')";
              $resultadodelete = $this->mysqli->query($sql2);
            }
            $lineas = $lineas - 12;
            $grupo = $grupo + 1;
          }else if ($lineas == 11){

          }else if ($lineas == 10) {

          }else if ($lineas == 9) {

          }else if($lineas == 8){

          }else{
            $sql = "SELECT * FROM partcampeonatos WHERE (nombreCamp = '$this->nombre')";
            $resultado12 = $this->mysqli->query($sql);
            $arrayresultado = mysqli_fetch_row($resultado12);
            for($i = 0; $i < $lineas; $i++) {
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
