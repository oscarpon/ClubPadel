<?php
  class InscripCampModel{

    var $miembro1;
    var $miembro2;
    var $nombreCamp;

    function __construct($miembro1,$miembro2, $nombreCamp){
      $this->miembro1=$miembro1;
      $this->miembro2=$miembro2;
      $this->nombreCamp=$nombreCamp;

      include_once '../functions/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function SEARCH(){
      $sql="SELECT * from PARTCAMPEONATOS
        where ((BINARY miembro1 LIKE '%$this->miembro1%')
        && (BINARY miembro2 LIKE '%$this->miembro2%')
        && (BINARY nombreCamp LIKE '%$this->nombreCamp%'))";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function ADD() {
      if (($this->miembro1 <> '') && ($this->miembro2 <> '') && ($this->nombreCamp <> '')){//1
        $sql="SELECT * FROM PARTCAMPEONATOS WHERE ((miembro1='$this->miembro1' OR miembro2='$this->miembro1')
          AND nombreCamp='$this->nombreCamp')";

        if (!($resultado=$this->mysqli->query($sql))){//2
          return 'Error en la conexion a la base de datos1.';
        }
        else{//2
            if ($resultado->num_rows == 0){
              $sql="SELECT * FROM PARTCAMPEONATOS WHERE ((miembro1='$this->miembro2' OR miembro2='$this->miembro2')
                AND nombreCamp='$this->nombreCamp')";
                if (!($resultado=$this->mysqli->query($sql))){//2
                  return 'Error en la conexion a la base de datos2.';
                }
                else{//2
                    if ($resultado->num_rows == 0){
                      $sql = "INSERT INTO PARTCAMPEONATOS VALUES ('$this->miembro1','$this->miembro2',
                      '$this->nombreCamp')";
                      if (!($resultado=$this->mysqli->query($sql))){//2
                        return 'Error en la conexion a la base de datos3.';
                      }
                      else{//2
                        return 'Inscripción realizada con éxito.';
                      }
                    }else{
                      return 'Tu compañero ya está incrito.';
                    }
                }
            }else{
              return 'Ya estás inscrito a este campeonato.';
            }
        }
      }else {
        return 'Introduzca un valor.';//1
      }
    }

    function DELETE(){
      $sql="SELECT * FROM PARTCAMPEONATOS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2' AND nombreCamp='$this->nombreCamp')";
      $resultado=$this->mysqli->query($sql);

      if ($resultado->num_rows == 1){
        $sql="DELETE FROM PARTCAMPEONATOS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2' AND nombreCamp='$this->nombreCamp')";
        $this->mysqli->query( $sql );
        return 'Eliminado correctamente';
      } else{
        return 'No existe';
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
