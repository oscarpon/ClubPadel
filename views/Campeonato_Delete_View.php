<?php

    class CampeonatoDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="tablaCampeonato">
    <center>
		<table>
			<tr id="titulosTabCampeonato">
				<th>Nombre</th>
				<th>Fecha fin inscripcion</th>
				<th>Categoria</th>
				<th>Genero</th>
				<th>Estado</th>
			</tr>

            </table>
            <br>
            <form name="x" method="post" action="../controllers/Campeonato_Controller.php?action=DELETE">

                       <input type="hidden" name="nombre" value="<?php echo $valores[0];?>">

            </form>
            <table>
                       <tr>
                        <th>Nombre</th>
                        <td><?php echo $valores[0];?></td>
                      </tr>
                       <tr>
                        <th>Fecha Fin</th>
                        <td><?php echo $valores[1];?></td>
                      </tr>
                       <tr>
                        <th>Categoria</th>
                        <td><?php echo $valores[2];?></td>
                      </tr>
                      <tr>
                       <th>Genero</th>
                       <td><?php echo $valores[3];?></td>
                     </tr>
                     <tr>
                      <th>Estado</th>
                      <td><?php echo $valores[4];?></td>
                    </tr>
          </table>
            <h4 id="mensajeEliminar">¿Desea borrar este campeonato?</h4>

            <button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmar"></button>
            </form>
            <center><a href="../controllers/Campeonato_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverEl"></a></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
