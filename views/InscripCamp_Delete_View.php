<?php

    class InscripCampDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaInscripCampEl">
    <center>
		<table>
			<tr id="titulosTabEl">
				<th>Miembro 1</th>
				<th>Miembro 2</th>
				<th>Campeonato</th>
			</tr>

			<tr id="nombresTabEl">
				<td><?php echo $valores['miembro1'] ?></td>
				<td><?php echo $valores['miembro2'] ?></td>
				<td><?php echo $valores['nombreCamp'] ?></td>
			</tr>

            </table>
            <br>
        <form action="../controllers/InscripCamp_Controller.php" name ='DELETE' method="post">
            <input type="hidden" name = 'miembro1' value="<?php echo $valores['miembro1'] ?>" readonly>
            <input type="hidden" name = 'miembro2' value="<?php echo $valores['miembro2'] ?>" readonly>
            <input type="hidden" name = 'nombreCamp' value="<?php echo $valores['nombreCamp'] ?>" readonly>
            <h4 id="mensajeEliminar">¿Desea borrar esta inscripción?</h4>

            <button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmar"></button>
            </form>
            <center><a href="../controllers/InscripCamp_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverEl"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
