<?php
class OferPromPartidoModel{
  var $email;
  var $fecha;
  var $partic1;
  var $partic2;
  var $partic3;
  var $partic4;
  var $numpart;
  var $tipo;
  var $mysqli;

  function __construct($email, $fecha, $partic1, $partic2, $partic3, $partic4, $numpart, $tipo){
    $this->email = $email;
    $this->fecha = $fecha;
    $this->partic1 = $partic1;
    $this->partic2 = $partic2;
    $this->partic3 = $partic3;
    $this->partic4 = $partic4;
    $this->numpart = $numpart;
    $this->tipo = $tipo;

    include_once '../functions/BdAdmin.php';
    $this->mysqli=ConectarBD();
  }

  function ADD(){
    $fecha = date("Y-m-d H:i:s");
    if($this->email <> '' && $fecha <> ''){
      $sql = "SELECT * FROM oferprompartidos WHERE(email='$this->email' AND fecha='$fecha')";
      if(!($resultado=$this->mysqli->query($sql))){
        return 'Error de base de datos';
      }else{
        if($resultado->num_rows == 0){
          $sql = "INSERT INTO oferprompartidos VALUES('$this->email',
                                                    '$fecha',
                                                    '$this->partic1',
                                                    'Puesto vacio',
                                                    'Puesto vacio',
                                                    'Puesto vacio',
                                                    '$this->numpart',
                                                    '$this->tipo')";
        }else{
          return 'Ya existe una oferta o promocion en esta fecha.';
        }
        if(!$this->mysqli->query($sql)){
          return 'Error en la base de datos.';
        }else{
          return 'Insercion realizada satisfactoriamente.';
        }
      }
    }else{
      return 'Se necesita un email y una fecha.';
    }
  }

  function SEARCH(){
    $sql = "SELECT * FROM oferprompartidos WHERE(email LIKE '%$this->email%' AND tipo='$this->tipo')";
    if(!($resultado=$this->mysqli->query($sql))){
      return 'Error en la consulta a la base de datos';
    }else{
      return $resultado;
    }
  }

  function DELETE(){
    $sql = "SELECT * FROM oferprompartidos WHERE(email='$this->email' AND fecha='$this->fecha')";
    if(!($resultado=$this->mysqli->query($sql))){
      return 'Error en la base de datos.';
    }else{
      if($resultado->num_rows == 0){
        return 'No existen estos datos.';
      }else{
        $sql = "DELETE FROM oferprompartidos WHERE(email='$this->email' AND fecha='$this->fecha')";
        if(!($resultado=$this->mysqli->query($sql))){
          return 'Error en la base de datos';
        }else{
          return 'Operacion realizada correctamente.';
        }
      }
    }
  }

  function EDIT(){

  }

  function RellenaDatos(){
    $sql = "SELECT * FROM oferprompartidos WHERE (email = '$this->email' AND fecha='$this->fecha')";
    if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
     return 'No existe en la base de datos'; //
    } else {
      $result = $resultado->fetch_array();
      return $result;
    }
  }

  function comprobarParticipacion(){
    $sql = "SELECT numpart FROM oferprompartidos WHERE (email = '$this->email' AND fecha= '$this->fecha')";
    if(!($resultado=$this->mysqli->query($sql))){
      return 'Error en la base de datos.';
    }else{
        $arrayPart = $resultado->fetch_array();
        return $arrayPart;
    }
  }

  function comprobarDispPistas(){
    $sql = "SELECT t1.codigoPista, t1.fecha
            FROM pistas as t1
            WHERE NOT EXISTS (SELECT t2.codigoPista, t2.fecha
            FROM reservas as t2 WHERE t1.codigoPista = t2.codigoPista
            AND t1.fecha = t2.fecha) AND NOT EXISTS (SELECT t3.codigoPista, t3.fecha
            FROM partidos as t3 WHERE t1.codigoPista = t3.codigoPista
            AND t1.fecha = t3.fecha AND t3.resultado = 'NJ') AND NOT EXISTS (SELECT t4.codigoPista, t4.fecha
            FROM partidocamp as t4 WHERE t1.codigoPista = t4.codigoPista
            AND t1.fecha = t4.fecha AND t4.resultado = 'NJ')";
    if($resultado=$this->mysqli->query($sql)){
      $arrayPistas = $resultado->fetch_array();
      return $arrayPistas;
    }
  }

  function crearPartido($pistas){
    $pistaElegida = $pistas[0];
    $fechaElegida = $pistas[1];
    if($pistaElegida <> '' && $fechaElegida <> ''){
      $sql = "SELECT * FROM partidos WHERE(codigoPista='$pistaElegida' AND fecha='$fechaElegida')";
      if(!($resultado=$this->mysqli->query($sql))){
        return 'Error de base de datos';
      }else{
        if($resultado->num_rows == 0){
          $sql = "INSERT INTO partidos VALUES('$pistaElegida',
                                              '$fechaElegida',
                                              '$this->partic1',
                                              '$this->partic2',
                                              '$this->partic3',
                                              '$this->partic4',
                                              'NJ')";
        }else{
          return 'Ya hay un partido en esta pista y en esta fecha.';
        }
        if(!($resultado=$this->mysqli->query($sql))){
          return 'Error en la base de datos.';
        }
      }
    }else{
      return 'Se necesita un codigo de pista y una fecha.';
    }
  }

}



 ?>
