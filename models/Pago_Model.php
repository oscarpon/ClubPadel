<?php
  class PagoModel{

    var $email;
    var $fecha;
    var $importe;
    var $pagado;
    var $mysqli;

    function __construct($email,$fecha,$importe,$pagado){
      $this->email=$email;
      $this->fecha=$fecha;
      $this->importe=$importe;
      $this->pagado=$pagado;

      include_once '../functions/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function SEARCH(){
      $sql="SELECT * FROM PAGOS WHERE (email LIKE '%$this->email%'
                                      AND fecha LIKE '%$this->fecha%'
                                      AND importe LIKE '%$this->importe%'
                                      AND pagado LIKE '%$this->pagado%')";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function ADD() {
      $fecha = date("Y-m-d H:i:s");
      if ($this->email <> '' && $fecha <> ''){
        $sql="SELECT * FROM USUARIOS WHERE (email='$this->email')";
        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la conexion a la base de datos';
        }
        else{
          if($resultado->num_rows == 1){
            $sql="SELECT * FROM PAGOS WHERE (email='$this->email' AND fecha='$fecha')";

            if (!($resultado=$this->mysqli->query($sql))){
              return 'Error en la conexion a la base de datos';
            }
            else{
                if($resultado->num_rows == 0){
                  $sql="INSERT INTO PAGOS (email,fecha,importe,pagado)
                    VALUES('$this->email',
                    '$fecha',
                    '$this->importe',
                    '$this->pagado')";
                }
                else {
                  return 'Ya existe un pago con el correo y fecha introducidos';
                }

                if (!$this->mysqli->query($sql)){
                  return 'Error en la inserción';
                }
                else{
                  return 'Insercion realizada';
                }
            }
          }else{
            return 'Este usuario no existe';
          }
        }
      }else {
      return 'Introduzca un valor';
      }
    }

    function EDIT(){
      if ($this->email <> '' && $this->fecha <> ''){
        $sql="SELECT * FROM PAGOS WHERE (email='$this->email' AND fecha='$this->fecha')";
        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la conexion a la base de datos';
        }
        else{
          if($resultado->num_rows == 1){
            $sql="UPDATE PAGOS SET email='$this->email',
                                   fecha='$this->fecha',
                                   importe='$this->importe',
                                   pagado='S'
                                WHERE (email='$this->email' AND fecha='$this->fecha')";
          }
          else {
            return 'No existe este pago';
          }

          if (!$this->mysqli->query($sql)){
            return 'Error en la modificación';
          }
          else{
              return 'Modificación realizada';
          }
      }
    }
    else {
      return 'Introduzca un valor';
    }
  }
    function DELETE(){
      $sql="SELECT * FROM PAGOS WHERE (email='$this->email' AND fecha='$this->fecha')";
      $resultado=$this->mysqli->query($sql);

      if ($resultado->num_rows == 1){
        $sql="DELETE FROM PAGOS WHERE (email='$this->email' AND fecha='$this->fecha')";
        $this->mysqli->query( $sql );
        return 'Eliminado correctamente';
      } else{
        return 'No existe';
      }
    }

    function RellenaDatos(){
      $sql = "SELECT * FROM PAGOS WHERE (email = '$this->email' AND fecha='$this->fecha')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }
}
 ?>
