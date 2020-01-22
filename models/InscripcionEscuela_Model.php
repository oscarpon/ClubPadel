<?php
  class InscripcionEscuelaModel{

    var $nombre;
    var $horario;
    var $email;

    function __construct($nombre, $horario, $email){
      $this->nombre=$nombre;
      $this->horario=$horario;
      $this->email=$email;

      include_once '../functions/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function SEARCH(){
      $sql="SELECT * from INSCRIPCIONESCLASES
        where ((BINARY nombre LIKE '%$this->nombre%')
        && (BINARY horario LIKE '%$this->horario%')
        && (BINARY email LIKE '%$this->email%'))";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function SEARCH_ESC(){
      $sql="SELECT * from ESCUELASDEPORTIVAS where estado = 'abierto'";
        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function ADD() {
      if (($this->nombre <> '') && ($this->horario <> '') && ($this->email <> '')){//primer if
        $sql="SELECT * FROM INSCRIPCIONESCLASES WHERE (nombre='$this->nombre' AND horario='$this->horario'
          AND email='$this->email')";

        if (!($resultado=$this->mysqli->query($sql))){//segundo if
          return 'Error en la conexion a la base de datos1.';
        }
        else{//segundo else
            if ($resultado->num_rows == 0){//primer if
              $sql="SELECT COUNT(ic.nombre) as numLineas, ed.minInscritos as minInscritos, ed.maxInscritos as maxInscritos,
                    ed.periodicidad as periodicidad FROM escuelasdeportivas ed, inscripcionesclases ic
                    WHERE ed.nombre = ic.nombre AND ed.horario=ic.horario AND ed.nombre = '$this->nombre'";
                if (!($resultado=$this->mysqli->query($sql))){//segundo if
                  return 'Error en la conexion a la base de datos2.';
                }
                else{//2
                    $cifras = mysqli_fetch_assoc($resultado);
                    $numLineas = $cifras['numLineas'];
                    $minInscritos = $cifras['minInscritos'];
                    $maxInscritos = $cifras['maxInscritos'];
                    $periodicidad = $cifras['periodicidad'];
                    $fecha = $this->horario;
                    if($numLineas == 0 || $numLineas < $maxInscritos){//tercer if
                        for($i = 0; $i < $periodicidad; $i++){
                            $insert = "INSERT INTO INSCRIPCIONESCLASES VALUES('$this->nombre', '$fecha', '$this->email')";
                            if (!($resultado=$this->mysqli->query($insert))){// cuarto if
                                return 'Error en la conexion a la base de datos3.';
                            }
                            else{//cuarto else
                                $datetime = new DateTime($fecha);
                                $datetime->add(new DateInterval('P7D'));
                                $fecha = $datetime->format('Y-m-d H:i:s');
                            }
                        }
                        return 'Has sido inscrito satisfactoriamente.';
                    }
                    else{// tercer else
                        return "La escuela no admite más inscritos.";
                    }
                }
            }else{// segundo else
              return 'Ya estás inscrito a esta escuela.';
            }
        }
      }else {// primer else
        return 'Introduzca un valor.';//1
      }
    }
    function ADD2($merge, $fechaActual){
      if (($this->nombre <> '')){
          $sql = "SELECT * FROM inscripcionesclases WHERE (nombre = '$this->nombre'AND horario='$this->horario'
            AND email='$this->email')";
  		if (!$result = $this->mysqli->query($sql)){
  			return 'Imposible ConectarBD';
  		}
  		else {
        if ($this->horario < $fechaActual) {
          return 'Datos de fecha erroneos';
        }
  			if ($result->num_rows == 0){

  				$sql = "INSERT INTO inscripcionesclases (
            nombre,
  					horario,
  					email
          )
  						VALUES (
              '$this->nombre',
  						'$merge',
  						'$this->email'
  						)";


  				if (!$this->mysqli->query($sql)) {
  					return 'Error';
  				}
  				else{
  					return 'Entrenador OK';
  				}

  			}
  			else
  				return 'Error Entrenador';
  		}
      }

    }

    function RellenaDatos(){
      $sql="SELECT * FROM PARTCAMPEONATOS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2' AND nombreCamp='$this->nombreCamp')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }
}
 ?>
