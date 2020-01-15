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
}

 ?>
