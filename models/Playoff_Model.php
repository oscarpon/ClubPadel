<?php

class PlayoffModel
{
  var $idPlayoff;
  var $miembro1Par1;
  var $miembro2Par1;
  var $miembro1Par2;
  var $miembro2Par2;
  var $nombreCamp;
  var $resultado;
  var $partMinimos = 8;

  function __construct($idPlayoff, $miembro1Par1, $miembro2Par1, $miembro1Par2, $miembro2Par2, $nombreCamp, $resultado)
  {
    $this->idPlayoff = $idPlayoff;
    $this->miembro1Par1 = $miembro1Par1;
    $this->$miembro2Par1 = $miembro2Par1;
    $this->miembro1Par2 = $miembro1Par2;
    $this->$miembro2Par2 = $miembro2Par2;
    $this->nombreCamp = $nombreCamp;
    $this->resultado = $resultado;

    include_once '../functions/BdAdmin.php';
    $this->mysqli = ConectarBD();

  }


    function RellenaDatos(){
      $sql = "SELECT * FROM playoffs WHERE (idPlayoff='$this->idPlayoff')";
		  if ( !( $resultado = $this->mysqli->query( $sql ) ) ) {
			 return 'No existe en la base de datos'; //
		  } else {
  			$result = $resultado->fetch_array();
  			return $result;
		  }
    }

    function SEARCH(){
      $sql = "SELECT * FROM playoffs WHERE nombreCamp='$this->nombreCamp'";
  		$resultado = $this->mysqli->query($sql);
  		return $resultado;
    }

    function SEARCH_GR(){
      $sql="SELECT nombreCamp, grupo FROM clasificacion WHERE nombreCamp = '$this->nombreCamp' GROUP BY grupo";

        if (!($resultado=$this->mysqli->query($sql))){
            return 'Error en la consulta';
        } else {
            return $resultado;
        }
    }

    function EDIT(){
  	     $sql = "SELECT * FROM playoffs  WHERE (idPlayoff='$this->idPlayoff') ";

        $result = $this->mysqli->query($sql);

        if ($result->num_rows == 1)
        {

    		$sql = "UPDATE playoffs SET resultado = '$this->resultado' WHERE (idPlayoff='$this->idPlayoff') ";
            if (!($resultado = $this->mysqli->query($sql))){
    			       return 'Error en la modificación';
    		    }
    		    else{
    			       return 'Modificado correctamente';
    		    }
        }
        else{
        	return 'No existe en la base de datos';
        }
    }

    function generarPlayoffs($grupo){
      $sql = "SELECT * FROM playoffs WHERE idPlayoff='$this->idPlayoff'";
      if (!($resultado = $this->mysqli->query($sql))){
           return 'Error en la consulta';
      }
      else{
           if($resultado -> num_rows > 0){
             return 'Este campeonato ya tiene playoffs creados.';
           }
           else{
             $sql = "SELECT * FROM clasificacion WHERE nombreCamp='$this->nombreCamp'";
             if (!($resultado = $this->mysqli->query($sql))){
                  return 'Error en la consulta';
             }
             else{
               if($resultado -> num_rows == 0){
                 return 'Este campeonato no tiene grupos creados.';
               }
               else{
                 $sql = "SELECT miembro1, miembro2 FROM clasificacion
                          WHERE nombreCamp='$this->nombreCamp' AND grupo = $grupo ORDER BY puntos DESC LIMIT 8";
                 $participantes = $this->mysqli->query($sql);
                 if (!($participantes = $this->mysqli->query($sql))){
                      return 'Error en la consulta';
                 }
                 else{
                    $numMiembros = 2;
                    $rows = [];
                    //Bloque de formación de array de arrays
                    while($row = mysqli_fetch_assoc($participantes)){
                      $rows[] = $row;
                    }
                    //Obtenemos el número de filas
                    $numFilas = count($rows);
                    //Recogemos los dos primeros resultados
                    for($i = 0 ; $i < $numFilas; $i+=2){
                      if(isset($rows[$i+1])){
                          $m1Local = $rows[$i]['miembro1'];
                          $m2Local = $rows[$i]['miembro2'];
                          $m1Visitante = $rows[$i+1]['miembro1'];
                          $m2Visitante = $rows[$i+1]['miembro2'];
                          $consulta = "SELECT * FROM playoffs WHERE nombreCamp = '$this->nombreCamp' AND miembro1Par1='$m1Local' AND miembro2Par1='$m2Local'
                                        AND miembro1Par2='$m1Visitante' AND miembro2Par2='$m2Visitante'";
                          $resultadoConsulta = $this->mysqli->query($consulta);
                          if($resultadoConsulta -> num_rows == 0){
                            $insert = "INSERT INTO playoffs VALUES('$this->idPlayoff','$m1Local', '$m2Local', '$m1Visitante', '$m2Visitante', '$this->nombreCamp', 'NJ')";
                            if (!($resultadoInsert = $this->mysqli->query($insert))){
                                 return 'Error en la consulta';
                            }
                          }
                          else{
                              return 'Este grupo ya tiene partidos de playoffs creados.';
                          }
                      }
                    }
                    return 'Playoffs creados.';
                 }

               }
             }
           }
      }
    }
}

/*array(8) {
    [0]=> array(4) { [0]=> string(11) "a@gmail.com" ["miembro1"]=> string(11) "a@gmail.com" [1]=> string(11) "b@gmail.com" ["miembro2"]=> string(11) "b@gmail.com" }
    [1]=> array(4) { [0]=> string(16) "correo7@mail.com" ["miembro1"]=> string(16) "correo7@mail.com" [1]=> string(16) "correo8@mail.com" ["miembro2"]=> string(16) "correo8@mail.com" }
    [2]=> array(4) { [0]=> string(16) "correo5@mail.com" ["miembro1"]=> string(16) "correo5@mail.com" [1]=> string(16) "correo6@mail.com" ["miembro2"]=> string(16) "correo6@mail.com" }
    [3]=> array(4) { [0]=> string(11) "c@gmail.com" ["miembro1"]=> string(11) "c@gmail.com" [1]=> string(11) "d@gmail.com" ["miembro2"]=> string(11) "d@gmail.com" }
    [4]=> array(4) { [0]=> string(18) "correo13@gmail.com" ["miembro1"]=> string(18) "correo13@gmail.com" [1]=> string(18) "correo14@gmail.com" ["miembro2"]=> string(18) "correo14@gmail.com" }
    [5]=> array(4) { [0]=> string(18) "correo15@gmail.com" ["miembro1"]=> string(18) "correo15@gmail.com" [1]=> string(18) "correo16@gmail.com" ["miembro2"]=> string(18) "correo16@gmail.com" }
    [6]=> array(4) { [0]=> string(18) "correo17@gmail.com" ["miembro1"]=> string(18) "correo17@gmail.com" [1]=> string(18) "correo18@gmail.com" ["miembro2"]=> string(18) "correo18@gmail.com" }
    [7]=> array(4) { [0]=> string(18) "correo19@gmail.com" ["miembro1"]=> string(18) "correo19@gmail.com" [1]=> string(18) "correo20@gmail.com" ["miembro2"]=> string(18) "correo20@gmail.com" } }
*/
/*array(8) { [0]=> array(2) { ["miembro1"]=> string(11) "a@gmail.com" ["miembro2"]=> string(11) "b@gmail.com" }
[1]=> array(2) { ["miembro1"]=> string(16) "correo7@mail.com" ["miembro2"]=> string(16) "correo8@mail.com" }
[2]=> array(2) { ["miembro1"]=> string(16) "correo5@mail.com" ["miembro2"]=> string(16) "correo6@mail.com" }
[3]=> array(2) { ["miembro1"]=> string(11) "c@gmail.com" ["miembro2"]=> string(11) "d@gmail.com" }
[4]=> array(2) { ["miembro1"]=> string(18) "correo13@gmail.com" ["miembro2"]=> string(18) "correo14@gmail.com" }
[5]=> array(2) { ["miembro1"]=> string(18) "correo15@gmail.com" ["miembro2"]=> string(18) "correo16@gmail.com" }
[6]=> array(2) { ["miembro1"]=> string(18) "correo17@gmail.com" ["miembro2"]=> string(18) "correo18@gmail.com" }
[7]=> array(2) { ["miembro1"]=> string(18) "correo19@gmail.com" ["miembro2"]=> string(18) "correo20@gmail.com" } }*/
 ?>
