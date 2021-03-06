<?php

    class CampeonatoDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaElCamp">
    <center>
		<table>
			<tr id="titulosTabCampeonato">
				<th>Nombre</th>
				<th>Fecha fin inscripcion</th>
				<th>Categoria</th>
				<th>Genero</th>
				<th>Estado</th>
			</tr>
      <tr>
    		<td><?php echo $valores['nombre']?></td>
    		<td><?php echo $valores['fechaFinIns']?></td>
    		<td><?php echo $valores['categoria']?></td>
    		<td><?php echo $valores['genero']?></td>
        <td><?php echo $valores['estado']?></td>
    	</tr>
      <form name="x" method="post" action="../controllers/Campeonato_Controller.php" name ='DELETE' method="post">
      	 <h4 id="mensajeEliminar">¿Desea borrar este campeonato?</h4>
      	 <input type="hidden" name = 'nombre' value="<?php echo $valores['nombre'] ?>" readonly>
      	 <input type="hidden" name = 'fechaFinIns' value="<?php echo $valores['fechaFinIns'] ?>" readonly>
      	 <input type="hidden" name = 'categoria' value="<?php echo $valores['categoria'] ?>" readonly>
      	 <input type="hidden" name = 'genero' value="<?php echo $valores['genero'] ?>" readonly>
         <input type="hidden" name = 'estado' value="<?php echo $valores['esatado'] ?>" readonly>
      				<button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmar"></button>
      				</form>


            <center><a href="../controllers/Campeonato_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverElCamp"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
