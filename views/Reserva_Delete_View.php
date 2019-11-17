<?php

    class ReservaDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaReservasEl">
    <center>
		<table>
			<tr id="titulosTabEl">
				<th>Email</th>
				<th>Código de pista</th>
				<th>Fecha</th>
			</tr>

			<tr id="nombresTabEl">
				<td><?php echo $valores['email'] ?></td>
				<td><?php echo $valores['codigoPista'] ?></td>
				<td><?php echo $valores['fecha'] ?></td>
			</tr>

            </table>
            <br>
        <form action="../controllers/Reserva_Controller.php" name ='DELETE' method="post">
            <input type="hidden" name = 'email' value="<?php echo $valores['email'] ?>" readonly>
            <input type="hidden" name = 'codigoPista' value="<?php echo $valores['codigoPista'] ?>" readonly>
            <input type="hidden" name = 'fecha' value="<?php echo $valores['fecha'] ?>" readonly>
            <h4 id="mensajeEliminar">¿Desea cancelar esta reserva?</h4>

            <button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmar"></button>
            </form>
            <center><a href="../controllers/Reserva_Controller.php"><img src="../img/volver.png" width="21px" height="21px" class="botonVolverEl"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
