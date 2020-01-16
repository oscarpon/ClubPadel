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

  function añadirCampeonato($categorias, $generos){
    if (($this->nombre <> '')){
      $i = 0;
      $cont = 0;
      while($i != 3){
        if(isset($categorias[$i])){
          $categoria = $categorias[$i];
          $arrayGeneros = $generos;
          foreach($arrayGeneros as $genero){
              $nombreCamp = $this->nombre.$categorias[$i].$genero;
              $sql = "SELECT * FROM campeonato WHERE(nombre='$nombreCamp')";
              if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
                   return 'Error en la consulta.';
              } else{
                  if($resultado -> num_rows == 0){
                      $insert = "INSERT INTO campeonato VALUES('$nombreCamp','$this->fechaFinIns','$categoria','$genero','$this->estado')";
                      $cont++;
                      if ( !( $resultado = $this->mysqli->query( $insert ) ) ) {
                           return 'Error en la inserción.';
                      }
                  }
              }
          }
        }
        $i++;
      }
      if($cont == 0){
          return 'Campeonato creado anteriormente.';
      }
      else{
          return 'Campeonato creado.';
      }
    }
    else{
        return 'Valores vacíos.';
    }

  }

  function DELETE()
		{
		   $sql = "SELECT * FROM campeonato  WHERE
		   (nombre='$this->nombre')";

		    $result = $this->mysqli->query($sql);

		    if ($result->num_rows == 1)
		    {

		       $sql = "DELETE FROM campeonato  WHERE
		       (nombre='$this->nombre')";

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
      $sql = "SELECT * FROM partidocamp WHERE (nombre = '$this->nombre')";
      $resultado = $this->mysqli->query($sql);
      return $resultado;
    }

    function crearGrupo(){
      $consultaClasif = "SELECT * FROM clasificacion WHERE (nombreCamp='$this->nombre')";
      $resultadoClasif = $this->mysqli->query($consultaClasif);
      $lineasClasif = $resultadoClasif->num_rows;
      if($lineasClasif > 0){
          return 'Grupos creados previamente';
      }
      else{
        $sql = "SELECT * FROM partcampeonatos WHERE (nombreCamp='$this->nombre')";
        $resultado = $this->mysqli->query($sql);
        $grupo = 1;
        $lineas = $resultado->num_rows;

        if($lineas < 8){
            return "No se puede crear, no hay suficientes";
        }else{
          while(!$lineas == 0){
            if ($lineas >= 12) {
              $limite = 12;
            }else if ($lineas == 11){
              $limite = 11;
            }else if ($lineas == 10) {
              $limite = 10;
            }else if ($lineas == 9) {
              $limite = 9;
            }else if($lineas == 8){
              $limite = 8;
            }else{
              $sql = "SELECT * FROM partcampeonatos WHERE (nombreCamp='$this->nombre')";
              $resultado12 = $this->mysqli->query($sql);
              while ($fila = mysqli_fetch_array($resultado12)) {
                $m1 = $fila['miembro1'];
                $m2 = $fila['miembro2'];
                $nm = $fila['nombreCamp'];
                $sql = "INSERT INTO clasificacion VALUES('$m1','$m2','$nm','$grupo',0)";
                $resultadoinsert = $this->mysqli->query($sql);
                $sql2 = "DELETE FROM partcampeonatos WHERE (miembro1='$m1'AND miembro2='$m2'AND nombreCamp='$nm')";
                $resultadodelete = $this->mysqli->query($sql2);
              }
              $lineas = 0;
              return 'Grupos creados satisfactoriamente';
            }
            $sql = "SELECT * FROM partcampeonatos WHERE (nombreCamp='$this->nombre') LIMIT $limite";
            $resultado12 = $this->mysqli->query($sql);
            while ($fila = mysqli_fetch_array($resultado12)) {
              $m1 = $fila['miembro1'];
              $m2 = $fila['miembro2'];
              $nm = $fila['nombreCamp'];
              $sql = "INSERT INTO clasificacion VALUES('$m1','$m2','$nm','$grupo',0)";
              $resultadoinsert = $this->mysqli->query($sql);
              $sql2 = "DELETE FROM partcampeonatos WHERE (miembro1='$m1'AND miembro2='$m2'AND nombreCamp='$nm')";
              $resultadodelete = $this->mysqli->query($sql2);
            }
            $lineas = $lineas - $limite;
            $grupo = $grupo + 1;
          }
        }
      }

    }

    function generarPartidos(){
      $hora = 0;
      $minuto = 0;
      $segundo = 0;
      $arrayPistas = array('000010', '000011', '000012', '000013', '000014');
        $grupo = 1;
        $sql = "SELECT * FROM clasificacion WHERE nombreCamp='$this->nombre' AND grupo='$grupo' ORDER BY puntos ASC";
        $resultado = $this->mysqli->query($sql);
        $sql2 = "SELECT * FROM clasificacion WHERE nombreCamp='$this->nombre' AND grupo='$grupo' ORDER BY puntos DESC";
        $resultado2 = $this->mysqli->query($sql2);
        if($resultado->num_rows > 0){
          while ($fila = mysqli_fetch_array($resultado)) {
              while ($fila2 = mysqli_fetch_array($resultado2)) {
                  $fecha = new DateTime('now');
                  $hora = $hora + 4;
                  $fecha->setTime($hora, $minuto, $segundo);
                  $fechaString = $fecha->format('Y-m-d H:i:s');
                  $pista = $arrayPistas[array_rand($arrayPistas)];
                  $miembro1Par1 = $fila['miembro1'];
                  $miembro2Par1 = $fila['miembro2'];
                  $miembro1Par2 = $fila2['miembro1'];
                  $miembro2Par2 = $fila2['miembro2'];
                  if($miembro1Par1 != $miembro1Par2){
                    $insertSQL = "INSERT INTO partidocamp VALUES('$pista', '$fechaString', '$miembro1Par1','$miembro2Par1',
                      '$miembro1Par2', '$miembro2Par2', '$this->nombre', 'NJ')";
                      if(!($resultadoSQL=$this->mysqli->query($insertSQL))){
                        return 'Error';
                      }
                  }
              }
          }
        }
    }
}



 ?>
