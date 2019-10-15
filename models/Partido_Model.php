<?php
  class PartidoModel(){
    var $codigoPista;
    var $fecha;
    var $miembro1Par1;
    var $miembro2Par1;
    var $miembro1Par2;
    var $miembro2Par2;
    var $resultado;

    function __construct($codigoPista, $fecha, $miembro1Par1, $miembro1Par2,
    $miembro1Par2, $miembro2Par2){
      $this->codigoPista = $codigoPista;
      $this->fecha = $fecha;
      $this->miembro1Par1 = $miembro1Par1;
      $this->miembro2Par1 = $miembro2Par1;
      $this->miembro1Par2 = $miembro1Par2;
      $this->miembro2Par2 = $miembro2Par2;
      $this->resultado = $resultado;

      include_once '../Functios/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function ADD(){
      if($this->codigoPista <> '' && $this->fecha <> ''){
        $sql = "SELECT * FROM partidos WHERE(codigoPista='$this->codigoPista' AND fecha='$this->fecha')";
        if(!($resultado=$this->mysqli->query($sql))){
          return 'Error de base de datos';
        }else{
          if($resultado->num_rows == 0){
            $sql = "INSERT INTO partidos VALUES($this->$codigoPista,
                                                $this->fecha,
                                                $this->miembro1Par1,
                                                $this->miembro2Par1,
                                                $this->miembro1Par2,
                                                $this->miembro2Par2,
                                                $this->resultado)";
          }else{
            return 'Ya existe un partido para esa fecha y esa pista.'
          }
          if(!($resultado=$this->msqli->query($sql))){
            return 'Error en la base de datos.';
          }else{
            return 'Partido creado satisfactoriamente.';
          }
        }
      }else{
        return 'Se necesita un código de pista y una fecha.';
      }
    }

    function SEARCH(){
      $sql = "SELECT * FROM partidos WHERE(codigoPista='$this->codigoPista'
                                          AND fecha='$this->fecha'
                                          AND miembro1Par1='$this->miembro1Par1',
                                          AND miembro2Par1='$this->miembro2Par1',
                                          AND miembro1Par2='$this->miembro1Par2',
                                          AND miembro2Par2='$this->miembro2Par2',
                                          AND resultado= $this->resultado)";
      if(!($resultado=$this->msqli->query($sql))){
        return 'Error en la consulta a la base de datos';
      }else{
        return $resultado;
      }
    }

    function DELETE(){
      $sql = "SELECT * FROM partidos WHERE(codigoPista='$this->codigoPista' AND fecha='$this->fecha')";
      if(!($resultado=$this->msqli->query($sql))){
        return 'Error en la base de datos.';
      }else{
        if($resultado->num_rows == 0){
          return 'No existe el partido.';
        }else{
          $sql = "DELETE FROM partidos WHERE(codigoPista='$this->codigoPista' AND fecha='$this->fecha')";
          if(!($resultado=$this->msqli->query($sql))){
            return 'Error en la base de datos';
          }else{
            return 'Eliminado correctamente.';
          }
        }
      }
    }

    function RellenaDatos(){
      $sql = "SELECT * FROM partidos WHERE (codigoPista = '$this->codigoPista' AND fecha='$this->fecha')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }
  }

 ?>
