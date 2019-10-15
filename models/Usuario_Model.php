<?php
  class UsuarioModel{

    var $email;
    var $password;
    var $nombre;
    var $apellidos;
    var $rol;
    var $genero;
    var $mysqli;

    function __construct($email,$password,$nombre,$apellidos,$rol,$genero){
      $this->email=$email;
      $this->password=$password;
      $this->nombre=$nombre;
      $this->apellidos=$apellidos;
      $this->rol=$rol;
      $this->genero=$genero;

      include_once '../functions/BdAdmin.php';
      $this->mysqli=ConectarBD();
    }

    function SEARCH(){
      $sql="SELECT email, password, nombre, apellidos, rol, genero
        from USUARIOS
        where ((BINARY email LIKE '%$this->email%')
        && (BINARY password LIKE '%$this->password%')
        && (BINARY nombre LIKE '%$this->nombre%')
        && (BINARY apellidos LIKE '%$this->apellidos%')
        && (BINARY rol LIKE '%$this->rol%')
        && (BINARY genero LIKE '%$this->genero%'))";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la consulta';
        } else {
            return $resultado;
          }
    }
    function ADD() {
      if (($this->email <> '')){
        $sql="SELECT * FROM USUARIOS WHERE (email='$this->email')";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la conexion a la base de datos';
        } else{
            if($result->num_rows == 0){
              $sql="INSERT INTO USUARIOS (email,password,nombre,apellidos,rol,genero)
                VALUES($this->email,
                $this->password,
                $this->nombre,
                $this->apellidos,
                $this->rol,
                $this->genero)";
            } else {
              return 'Ya existe un usuario con el correo introducido';
            }
              if (!$this->mysqli->query($sql)){
                return 'Error en la inserción';
              } else{
                return 'Inserción realizada';
              }
        }
      }else {
      return 'Introduzca un valor';
      }
    }

    function DELETE(){
      $sql="SELECT * FROM USUARIOS WHERE (email='$this->email')";
      $resultado=$this->mysqli->query($sql);

      if ($resultado->num_rows == 1){
        $sql="DELETE FROM USUARIOS WHERE (email='$this->email')";
        $this->mysqli->query( $sql );
        return 'Eliminado correctamente';
      } else{
        return 'No existe';
      }
    }

    function RellenaDatos(){
      $sql = "SELECT * FROM USUARIOS WHERE (email = '$this->email')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

    function Register(){
      if (($this->email <> '')){
        $sql="SELECT * FROM USUARIOS WHERE (email='$this->email')";

        if (!($resultado=$this->mysqli->query($sql))){
          return 'Error en la conexion a la base de datos';
        } else{
            if($resultado->num_rows == 0){
              $sql="INSERT INTO USUARIOS (email,password,nombre,apellidos,rol,genero)
                VALUES($this->email,
                $this->password,
                $this->nombre,
                $this->apellidos,
                'D',
                $this->genero)";
            } else {
              return 'Ya existe un usuario con el correo introducido';
            }
              if (!$this->mysqli->query($sql)){
                return 'Error en la inserción';
              } else{
                return 'Inserción realizada';
              }
        }
      }else {
      return 'Introduzca un valor';
      }
    }

    function login() {
        //hacemos la consulta para saber que usuario tiene dicho login
        $sql = "SELECT *
          FROM USUARIOS
          WHERE (
				        (email = '$this->email')
                )";

        $resultado = $this->mysqli->query( $sql );//hacemos la consulta en la base de datos
        if ( $resultado->num_rows == 0 ) {//miramos si el numero de filas es 0
  			     return 'El usuario no existe';

    		} else {//si no es 0, el usuario existe
    			$tupla = $resultado->fetch_array();//devolvemos la tupla

    			   if ( $tupla[ 'password' ] == $this->password ) {//si la contraseña es correcta entra en la página
    				       return true;

    			   } else {//en caso contrario no entra
    				       return 'La password para este usuario no es correcta';
    			   }
    	   }
	 }

function returnDatos($email){
  sql = "SELECT * FROM usuarios WHERE EMAIL = '".$email."'";

  if(!$this->mysqli->query($sql))
}

}
 ?>
