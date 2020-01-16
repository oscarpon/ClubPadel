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
}

 ?>
