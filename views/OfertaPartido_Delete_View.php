<?php

    class OfertaPartidoDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaOfertasEl">
    <center>
		<table>
			<tr id="titulosTabEl">
				<th>Usuario</th>
				<th>Fecha de oferta</th>
				<th>Pareja</th>
				<th>Contrincante 1</th>
				<th>Contrincante 2</th>
				<th>Participantes</th>
			</tr>

			<tr id="nombresTabEl">
				<td><?php echo $valores['email'] ?></td>
				<td><?php echo $valores['fecha'] ?></td>
				<td><?php echo $valores['partic2'] ?></td>
				<td><?php echo $valores['partic3'] ?></td>
				<td><?php echo $valores['partic4'] ?></td>
				<td><?php echo $valores['numpart'] ?></td>
			</tr>

            </table>
            <br>
        <form action="../controllers/OfertaPartido_Controller.php" name ='DELETE' method="post">
            <input type="hidden" name = 'email' value="<?php echo $valores['email'] ?>" readonly>
            <input type="hidden" name = 'fecha' value="<?php echo $valores['fecha'] ?>" readonly>
            <input type="hidden" name = 'partic1' value="<?php echo $valores['partic1'] ?>" readonly>
            <input type="hidden" name = 'partic2' value="<?php echo $valores['partic2'] ?>" readonly>
            <input type="hidden" name = 'partic3' value="<?php echo $valores['partic3'] ?>" readonly>
            <input type="hidden" name = 'partic4' value="<?php echo $valores['partic4'] ?>" readonly>
            <input type="hidden" name = 'numpart' value="<?php echo $valores['numpart'] ?>" readonly>
            <input type="hidden" name = 'tipo' value="<?php echo $valores['tipo'] ?>" readonly>
            <h4 id="mensajeEliminar">¿Desea borrar esta oferta?</h4>

            <button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmarOfPar"></button>
            </form>
            <center><a href="../controllers/OfertaPartido_Controller.php"><img src="../img/volver.png" width="21px" height="21px" class="botonVolverEl"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
