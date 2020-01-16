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
  function añadirEscuela(){
    if (($this->nombre <> '')){
        $sql = "SELECT * FROM escuelasdeportivas WHERE (nombre = '$this->nombre')";
		if (!$result = $this->mysqli->query($sql)){
			return 'Imposible ConectarBD';
		}
		else {
			if ($result->num_rows == 0){

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
						'$this->horario',
						'$this->entrenador',
						'$this->codigoPista',
						'$this->periodicidad',
            '$this->minInscritos',
            '$this->maxInscritos',
            '$this->estado'
						)";


				if (!$this->mysqli->query($sql)) {
					return 'Error';
				}
				else{
					return 'Escuela Deportiva añadida correctamente';
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
