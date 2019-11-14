<?php
  class ParejaModel{

    var $miembro1;
    var $miembro2;
    var $genero;
    var $nivel;

    function __construct($miembro1,$miembro2,$genero,$nivel){
      $this->miembro1=$miembro1;
      $this->miembro2=$miembro2;
      $this->genero=$genero;
      $this->nivel=$nivel;


      include_once '../functions/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function SEARCH(){
      $sql="SELECT * from PAREJAS
        where ((BINARY miembro1 LIKE '%$this->miembro1%')
        && (BINARY miembro2 LIKE '%$this->miembro2%')
        && (BINARY genero LIKE '%$this->genero%')
        && (BINARY nivel LIKE '%$this->nivel%'))";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function ADD($genero1,$genero2) {
      if (($this->miembro1 <> '') && ($this->miembro2 <> '')){//1
        $sql="SELECT * FROM PAREJAS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2')";

        if (!($resultado=$this->mysqli->query($sql))){//2
          return 'Error en la conexion a la base de datos';
        }
        else{//2
            if($resultado->num_rows == 0){//3
                $sql="SELECT * FROM USUARIOS WHERE (email='$this->miembro2' AND rol='D')";
                if (!($resultado=$this->mysqli->query($sql))){//4
                    return 'Error en la conexion a la base de datos';
                }
                else{//4
                  if($resultado->num_rows == 1){//5
                    if($this->miembro1 == $this->miembro2){
                      return 'No puedes formar pareja contigo mismo.';
                    }
                    else{
                      if($genero1 == $genero2){
                        $generoPareja = $genero1;
                      }
                      else{
                        $generoPareja = 'X';
                      }
                      $sql="INSERT INTO PAREJAS (miembro1,miembro2,genero,nivel) VALUES('$this->miembro1','$this->miembro2','$generoPareja','$this->nivel')";
                    }
                  }
                  else {//5
                    return 'No existe este deportista';
                  }

                  if (!$this->mysqli->query($sql)){//6
                    return 'Error en la inserción';
                  }
                  else{//6
                    return 'Inserción realizada';
                  }
                }
              }else {//3
                return 'Ya existe una pareja como esta';
              }
        }
      }else {
        return 'Introduzca un valor';//1
      }
    }

    function DELETE(){
      $sql="SELECT * FROM PAREJAS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2')";
      $resultado=$this->mysqli->query($sql);

      if ($resultado->num_rows == 1){
        $sql="DELETE FROM PAREJAS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2')";
        $this->mysqli->query( $sql );
        return 'Eliminado correctamente';
      } else{
        return 'No existe';
      }
    }

    function RellenaDatos(){
      $sql="SELECT * FROM PAREJAS WHERE (miembro1='$this->miembro1' AND miembro2='$this->miembro2')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

    function mostrarParejaNivel($nivel){
      $sql="SELECT * from PAREJAS
        where ((BINARY miembro1 LIKE '%$this->miembro1%')
        && (BINARY miembro2 LIKE '%$this->miembro2%')
        && (BINARY genero LIKE '%$this->genero%')
        && (BINARY nivel LIKE '%$this->nivel%') && nivel<='$nivel')";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }

}
 ?>
