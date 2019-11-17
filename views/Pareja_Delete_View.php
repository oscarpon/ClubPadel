<?php

    class ParejaDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaParejasEl">
    <center>
		<table>
			<tr id="titulosTabEl">
				<th>Miembro 1</th>
				<th>Miembro 2</th>
        <th>Genero</th>
        <th>Nivel</th>
			</tr>

			<tr id="nombresTabEl">
				<td><?php echo $valores['miembro1'] ?></td>
				<td><?php echo $valores['miembro2'] ?></td>
        <td><?php echo $valores['genero'] ?></td>
        <td><?php echo $valores['nivel'] ?></td>
			</tr>

            </table>
            <br>
        <form action="../controllers/Pareja_Controller.php" name ='DELETE' method="post">
            <input type="hidden" name = 'miembro1' value="<?php echo $valores['miembro1'] ?>" readonly>
            <input type="hidden" name = 'miembro2' value="<?php echo $valores['miembro2'] ?>" readonly>
            <input type="hidden" name = 'genero' value="<?php echo $valores['genero'] ?>" readonly>
            <input type="hidden" name = 'nivel' value="<?php echo $valores['nivel'] ?>" readonly>
            <h4 id="mensajeEliminar">¿Desea borrar esta pareja?</h4>

            <button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmarPareja"></button>
            </form>
            <center><a href="../controllers/Pareja_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverEl"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
