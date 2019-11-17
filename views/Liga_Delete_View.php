<?php

    class LigaDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaLigaEl">
    <center>
		<table>
			<tr id="titulosTabCampeonato">
				<th>Miembro 1</th>
				<th>Miembro 2</th>
				<th>Nombre Campeonato</th>
				<th>Grupo</th>
				<th>Puntos</th>
			</tr>
      <tr>
        <td><?php echo $valores['miembro1']?></td>
        <td><?php echo $valores['miembro2']?></td>
        <td><?php echo $valores['nombreCamp']?></td>
        <td><?php echo $valores['grupo']?></td>
        <td><?php echo $valores['puntos']?></td>
      </tr>
    </table>


   <form name="x" method="post" action="../controllers/Liga_Controller.php" name ='DELETE' method="post">
       <h4 id="mensajeEliminar">¿Desea borrar este campeonato?</h4>
       <input type="hidden" name = 'miembro1' value="<?php echo $valores['miembro1'] ?>" readonly>
       <input type="hidden" name = 'miembro2' value="<?php echo $valores['miembro2'] ?>" readonly>
       <input type="hidden" name = 'nombreCamp' value="<?php echo $valores['nombreCamp'] ?>" readonly>
       <input type="hidden" name = 'grupo' value="<?php echo $valores['grupo'] ?>" readonly>
       <input type="hidden" name = 'puntos' value="<?php echo $valores['puntos'] ?>" readonly>
            <button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmarElLiga"></button>
            </form>
    <center>
      <a href="../controllers/Liga_Controller.php"><img src="../img/volver.png" width="21px" height="21px" class="botonVolverEl"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
