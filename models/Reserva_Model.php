<?php
  class ReservaModel{
    var $email;
    var $codigoPista;
    var $fecha;

    function __construct($email, $codigoPista, $fecha){
      $this->email = $email;
      $this->codigoPista = $codigoPista;
      $this->fecha = $fecha;

      include_once '../functions/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function ADD($arrayPistas){
      $pistaElegida = $arrayPistas[0];
      $fechaElegida = $arrayPistas[1];

      if($pistaElegida <> '' && $fechaElegida <> '' && $this->email <> ''){
        $sql = "SELECT * FROM reservas WHERE(email='$this->email')";
        if(!($resultado=$this->mysqli->query($sql))){
          return 'Error de base de datos';
        }else{
          if($resultado->num_rows == 5){
            return 'No puedes reservar más de 5 pistas.';
          }
          else{
            $sql = "SELECT * FROM reservas WHERE(email='$this->email' AND codigoPista='$pistaElegida' AND fecha='$fechaElegida')";
            if(!($resultado=$this->mysqli->query($sql))){
              return 'Error de base de datos';
            }else{
              if($resultado->num_rows == 0){
                $sql = "INSERT INTO reservas VALUES('$this->email',
                                                '$pistaElegida',
                                                '$fechaElegida'
                                                )";
              }
              else{
                return 'Ya existe una reserva con ese email, para esa fecha y pista.';
              }
              if(!($resultado=$this->mysqli->query($sql))){
                return 'Error en la base de datos.';
              }else{
                return 'Pista reservarda satisfactoriamente.';
              }
            }
          }
        }
      }
      else{
        return 'Se necesita un email, código de pista y una fecha.';
      }
    }

    function SEARCH(){
      $sql = "SELECT * FROM reservas WHERE(email LIKE '%$this->email%'
                                          AND codigoPista LIKE '%$this->codigoPista%'
                                          AND fecha LIKE '%$this->fecha%')";
      if(!($resultado=$this->mysqli->query($sql))){
        return 'Error en la consulta a la base de datos';
      }else{
        return $resultado;
      }
    }

    function DELETE(){
      $fechaActual = date("Y-m-d H:i:s");
      $sql = "SELECT * FROM reservas WHERE(email='$this->email' AND codigoPista='$this->codigoPista' AND fecha='$this->fecha'
      AND TIMESTAMPDIFF(hour, fecha, '$fechaActual') <= -12)";
      if(!($resultado=$this->mysqli->query($sql))){
        return 'Error en la base de datos.';
      }else{
        if($resultado->num_rows == 0){
          return 'No puedes cancelar la reserva con menos de 12 horas de diferencia.';
        }else{
          $sql = "DELETE FROM reservas WHERE(email='$this->email' AND codigoPista='$this->codigoPista' AND fecha='$this->fecha')";
          if(!($resultado=$this->mysqli->query($sql))){
            return 'Error en la base de datos';
          }else{
            return 'Eliminado correctamente.';
          }
        }
      }
    }

    function RellenaDatos(){
      $sql = "SELECT * FROM reservas WHERE (email='$this->email' AND codigoPista = '$this->codigoPista' AND fecha='$this->fecha')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

    //Devuelve las pistas que están libres
    function comprobarDispPistas(){
      $sql = "SELECT t1.codigoPista, t1.fecha
              FROM pistas as t1
              WHERE NOT EXISTS (SELECT t2.codigoPista, t2.fecha
              FROM partidos as t2 WHERE t1.codigoPista = t2.codigoPista
              AND t1.fecha = t2.fecha AND t2.resultado = 'NJ') AND NOT EXISTS (SELECT t3.codigoPista, t3.fecha
              FROM partidocamp as t3 WHERE t1.codigoPista = t3.codigoPista
              AND t1.fecha = t3.fecha AND t3.resultado = 'NJ') AND NOT EXISTS (SELECT t4.codigoPista, t4.fecha
              FROM reservas as t4 WHERE t1.codigoPista = t4.codigoPista
              AND t1.fecha = t4.fecha) AND t1.fecha='$this->fecha'";
      if($resultado=$this->mysqli->query($sql)){
        return $resultado;
      }
    }
    function comprobarDispFechas(){
      $fecha = date("Y-m-d H:i:s");
      $sql = "SELECT DISTINCT t1.fecha
              FROM pistas as t1
              WHERE NOT EXISTS (SELECT t2.fecha
              FROM reservas as t2 WHERE t1.codigoPista = t2.codigoPista
              AND t1.fecha = t2.fecha) AND NOT EXISTS (SELECT t3.fecha
              FROM partidos as t3 WHERE t1.codigoPista = t3.codigoPista
              AND t1.fecha = t3.fecha AND t3.resultado = 'NJ') AND NOT EXISTS (SELECT t4.fecha
              FROM partidocamp as t4 WHERE t1.codigoPista = t4.codigoPista
              AND t1.fecha = t4.fecha AND t4.resultado = 'NJ') AND TIMESTAMPDIFF(day, t1.fecha, '$fecha') <= -7
              ORDER BY t1.fecha";
      if($resultado=$this->mysqli->query($sql)){
        if($resultado->num_rows != 0){
            return $resultado;
        }
      }
    }
  }

 ?>
