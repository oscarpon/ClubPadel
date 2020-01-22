<?php
class EscuelaDeportivaModel{
  var $nombre;
  var $horario;
  var $entrenador;
  var $codigoPista;
  var $periodicidad;
  var $minInscritos;
  var $maxInscritos;
  var $estado;
  var $fechaActual;
  var $horaActual;



  function __construct($nombre, $horario, $entrenador, $codigoPista, $periodicidad, $minInscritos, $maxInscritos, $estado){
    $this->nombre=$nombre;
    $this->horario=$horario;
    $this->entrenador=$entrenador;
    $this->codigoPista=$codigoPista;
    $this->periodicidad=$periodicidad;
    $this->minInscritos=$minInscritos;
    $this->maxInscritos=$maxInscritos;
    $this->estado=$estado;

    include_once '../functions/BdAdmin.php';
    $this->mysqli=ConectarBD();
  }
  function showAll(){
    $sql = "SELECT * FROM escuelasdeportivas";
    $resultado = $this->mysqli->query($sql);
    return $resultado;
  }
  function añadirEscuela($merge, $fechaActual){
    if (($this->nombre <> '')){
        $sql = "SELECT * FROM escuelasdeportivas WHERE (nombre = '$this->nombre')";
		if (!$result = $this->mysqli->query($sql)){
			return 'Imposible ConectarBD';
		}
		else {
      if ($this->horario < $fechaActual) {
        return 'Datos de fecha erroneos';
      }
			if ($result->num_rows == 0){

        $sql="SELECT * FROM USUARIOS WHERE (email='$this->entrenador' AND rol='E')";
        if (!($resultado=$this->mysqli->query($sql))){//4
            return 'Error en la conexion a la base de datos';
        }
        else{//4
          if($resultado->num_rows == 1){//5

              $sql = "INSERT INTO escuelasdeportivas (
                nombre,
      					horario,
      					entrenador,
      				  codigoPista,
      					periodicidad,
                minInscritos,
                maxInscritos,
                estado
              )
      						VALUES (
                  '$this->nombre',
      						'$merge',
      						'$this->entrenador',
      						'$this->codigoPista',
      						'$this->periodicidad',
                  '$this->minInscritos',
                  '$this->maxInscritos',
                  '$this->estado'
      						)";



          }
          else {//5
            return 'No existe este entrenador';
          }

          if (!$this->mysqli->query($sql)){//6
            return 'Error en la inserción';
          }
          else{//6
            return 'Inserción realizada';
          }
        }
			}
			else
				return 'Escuela deportiva ya existe';
		}
    }

  }
  function RellenaDatos(){
    $sql = "SELECT * FROM escuelasdeportivas WHERE (nombre = '$this->nombre')";
    if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
     return 'No existe en la base de datos'; //
    } else {
      $result = $resultado->fetch_array();
      return $result;
    }
  }
  function DELETE()
		{
		   $sql = "SELECT * FROM escuelasdeportivas  WHERE
		   (nombre = '$this->nombre')";

		    $result = $this->mysqli->query($sql);

		    if ($result->num_rows == 1)
		    {

		       $sql = "DELETE FROM escuelasdeportivas  WHERE
		       (nombre = '$this->nombre')";

		        $this->mysqli->query($sql);

		    	return "Eliminada correctamente";
		    }
		    else
		        return "No se encuentra la escuela";
		}
}

 ?>
