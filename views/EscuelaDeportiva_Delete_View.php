<?php

    class EscuelaDeportivaDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaEscDepEl">
    <center>
		<table>
			<tr id="titulosTabCampeonato">
				<th>Nombre</th>
				<th>Horario</th>
				<th>Entrenador</th>
				<th>Pista</th>
				<th>Periodicidad</th>
        <th>Min Inscritos</th>
        <th>Max Inscritos</th>
        <th>estado</th>
			</tr>
      <tr>
    		<td><?php echo $valores['nombre']?></td>
    		<td><?php echo $valores['horario']?></td>
    		<td><?php echo $valores['entrenador']?></td>
    		<td><?php echo $valores['codigoPista']?></td>
        <td><?php echo $valores['periodicidad']?></td>
        <td><?php echo $valores['minInscritos']?></td>
        <td><?php echo $valores['maxInscritos']?></td>
        <td><?php echo $valores['estado']?></td>
    	</tr>
      <form name="x" method="post" action="../controllers/GestionEscuela_Controller.php" name ='DELETE' method="post">
      	 <h4 id="mensajeEliminar">¿Desea borrar esta escuela?</h4>
      	 <input type="hidden" name = 'nombre' value="<?php echo $valores['nombre'] ?>" readonly>
      	 <input type="hidden" name = 'horario' value="<?php echo $valores['horario'] ?>" readonly>
      	 <input type="hidden" name = 'entrenador' value="<?php echo $valores['entrenador'] ?>" readonly>
      	 <input type="hidden" name = 'codigoPista' value="<?php echo $valores['codigoPista'] ?>" readonly>
         <input type="hidden" name = 'periodicidad' value="<?php echo $valores['periodicidad'] ?>" readonly>
         <input type="hidden" name = 'minInscritos' value="<?php echo $valores['minInscritos'] ?>" readonly>
         <input type="hidden" name = 'maxInscritos' value="<?php echo $valores['maxInscritos'] ?>" readonly>
         <input type="hidden" name = 'estado' value="<?php echo $valores['estado'] ?>" readonly>
      				<button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmar"></button>
      				</form>


            <center><a href="../controllers/GestionEscuela_Controller.php"><img src="../img/volver.png" width="22px" height="22px" class="botonVolverElEscDep"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
