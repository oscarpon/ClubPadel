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
    if($this->email <> '' && $this->fecha <> ''){
      $sql = "SELECT * FROM oferprompartidos WHERE(email='$this->email' AND fecha='$this->fecha')";
      if(!($resultado=$this->mysqli->query($sql))){
        return 'Error de base de datos';
      }else{
        if($resultado->num_rows == 0){
          $sql = "INSERT INTO oferprompartidos VALUES('$this->email',
                                                    '$this->fecha',
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
    $sql = "SELECT * FROM oferprompartidos WHERE(email LIKE '%$this->email%'
                                                AND fecha LIKE '%$this->fecha%'
                                                AND partic1 LIKE '%$this->partic1%'
                                                AND partic2 LIKE '%$this->partic2%'
                                                AND partic3 LIKE '%$this->partic3%'
                                                AND partic4 LIKE '%$this->partic4%'
                                                AND numpart LIKE '%$this->numpart%'
                                                AND tipo LIKE '%$this->tipo%')";
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
//TODO: que un usuario no se inscriba varias veces en la misma oferprom
  function EDIT($usuario){
    if($this->email <> '' && $this->fecha <> ''){
      $sql = "SELECT * FROM oferprompartidos WHERE(email='$this->email' AND fecha='$this->fecha')";
      if(!($resultado=$this->mysqli->query($sql))){
        return 'Error de base de datos';
      }else{
        if($resultado->num_rows == 1){
          if($usuario <> $this->partic1 && $usuario <> $this->partic2 && $usuario <> $this->partic3 &&
            $usuario <> $this->partic4){
              if($this->numpart<4){
                $participantes=$this->numpart;
                $participantes++;
                if($this->partic1!='Puesto vacio'){
                  if($this->partic2!='Puesto vacio'){
                    if($this->partic3!='Puesto vacio'){
                      if($this->partic4!='Puesto vacio'){
                        return 'El partido esta completo.';
                      }else {
                        $sql = "UPDATE oferprompartidos SET email='$this->email',
                                                            fecha='$this->fecha',
                                                            partic1='$this->partic1',
                                                            partic2='$this->partic2',
                                                            partic3='$this->partic3',
                                                            partic4='$usuario',
                                                            numpart='$participantes',
                                                            tipo='$this->tipo'
                                                        WHERE(email='$this->email' AND fecha='$this->fecha')";
                      }
                    }else {
                      $sql = "UPDATE oferprompartidos SET email='$this->email',
                                                          fecha='$this->fecha',
                                                          partic1='$this->partic1',
                                                          partic2='$this->partic2',
                                                          partic3='$usuario',
                                                          partic4='$this->partic4',
                                                          numpart='$participantes',
                                                          tipo='$this->tipo'
                                                      WHERE(email='$this->email' AND fecha='$this->fecha')";
                    }
                  }else {
                    $sql = "UPDATE oferprompartidos SET email='$this->email',
                                                        fecha='$this->fecha',
                                                        partic1='$this->partic1',
                                                        partic2='$usuario',
                                                        partic3='$this->partic3',
                                                        partic4='$this->partic4',
                                                        numpart='$participantes',
                                                        tipo='$this->tipo'
                                                    WHERE(email='$this->email' AND fecha='$this->fecha')";
                  }
                }else {
                  $sql = "UPDATE oferprompartidos SET email='$this->email',
                                                      fecha='$this->fecha',
                                                      partic1='$usuario',
                                                      partic2='$this->partic2',
                                                      partic3='$this->partic3',
                                                      partic4='$this->partic4',
                                                      numpart='$participantes',
                                                      tipo='$this->tipo'
                                                  WHERE(email='$this->email' AND fecha='$this->fecha')";
                }
                if(!$this->mysqli->query($sql)){
                  return 'Error en la base de datos.';
                }else{
                  return 'Insercion realizada satisfactoriamente.';
                }

              }else {
                return 'El partido esta completo.';
              }
          }else{
            return 'Ya estás inscrito a este partido.';
          }
        }else{
          return 'No existe esta fila en la BD.';
        }

      }
    }else{
      return 'Se necesita un email y una fecha.';
    }

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
    $sql = "SELECT t1.codigoPista, t1.fecha FROM pistas as t1
            WHERE NOT EXISTS (SELECT t2.codigoPista, t2.fecha
            FROM reservas as t2 WHERE t1.codigoPista = t2.codigoPista
            AND t1.fecha = t2.fecha)
            AND NOT EXISTS (SELECT t3.codigoPista, t3.fecha
            FROM partidos as t3 WHERE t1.codigoPista = t3.codigoPista
            AND t1.fecha = t3.fecha AND t3.resultado = 'NJ')
            AND NOT EXISTS (SELECT t4.codigoPista, t4.fecha
            FROM partidocamp as t4 WHERE t1.codigoPista = t4.codigoPista
            AND t1.fecha = t4.fecha AND t4.resultado = 'NJ') AND t1.fecha='$this->fecha'";
    if($resultado=$this->mysqli->query($sql)){
      $arrayPistas = $resultado->fetch_array();
      return $arrayPistas;
    }
  }

  function comprobarDispFechas(){
    $sql = "SELECT DISTINCT t1.fecha
            FROM pistas as t1
            WHERE NOT EXISTS (SELECT t2.fecha
            FROM reservas as t2 WHERE t1.codigoPista = t2.codigoPista
            AND t1.fecha = t2.fecha) AND NOT EXISTS (SELECT t3.fecha
            FROM partidos as t3 WHERE t1.codigoPista = t3.codigoPista
            AND t1.fecha = t3.fecha AND t3.resultado = 'NJ') AND NOT EXISTS (SELECT t4.fecha
            FROM partidocamp as t4 WHERE t1.codigoPista = t4.codigoPista
            AND t1.fecha = t4.fecha AND t4.resultado = 'NJ') ORDER BY t1.fecha";
    if($resultado=$this->mysqli->query($sql)){
      if($resultado->num_rows != 0){
          return $resultado;
      }
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
          $sql = "SELECT partic1, partic2, partic3, partic4 FROM oferprompartidos WHERE(email='$this->email' AND fecha='$this->fecha')";
          if(!($resultado=$this->mysqli->query($sql))){
            return 'Error de base de datos';
          }else{
            $result = $resultado->fetch_array();
            $p1 = $result[0];
            $p2 = $result[1];
            $p3 = $result[2];
            $p4 = $result[3];
            $sql = "INSERT INTO partidos VALUES('$pistaElegida',
                                                '$fechaElegida',
                                                '$p1',
                                                '$p2',
                                                '$p3',
                                                '$p4',
                                                'NJ')";
          }
        }else{
          return 'Ya hay un partido en esta pista y en esta fecha.';
        }
        if(!($resultado=$this->mysqli->query($sql))){
          return 'Error en la base de datos.';
        }else{
          return 'Eras el ultimo inscrito, el partido ha sido creado.';
        }
      }
    }else{
      return 'Se necesita un codigo de pista y una fecha.';
    }
  }

}



 ?>
