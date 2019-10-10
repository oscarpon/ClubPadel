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

      include_once '../Functios/BdAdmin.php';
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
        && (BINARY genero LIKE '%$this->genero%'))"

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
              $sql="INSERT INTO USUARIO (email,password,nombre,apellidos,rol,genero)
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
        return 'Eliminado correctamente'
      } else{
        return 'No existe';
      }
    }

    function RellenaDatos(){
      $sql = "SELECT * FROM USUARIO WHERE (email = '$this->email')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

 ?>
