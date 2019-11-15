<?php

/**
 *
 */
class CampeonatoCurrentView
{

  function __construct($valores)
  {
    $this->render($valores);
  }

  function render($valores){
    include '../views/Header.php';

?>

<table class="tablaNoticiasTodo">
<tr>
  <th>Pista</th>
  <th>Fecha</th>
  <th>Miembro1</th>
  <th>Miembro2</th>
  <th>Miembro3</th>
  <th>Miembro4</th>
  <th>Campeonato</th>
  <th>Resultado</th>
</tr>
<tr>
  <td><?php echo $valores['codigoPista']?></td>
  <td><?php echo $valores['fecha']?></td>
  <td><?php echo $valores['miembro1Par1']?></td>
  <td><?php echo $valores['miembro2Par1']?></td>
  <td><?php echo $valores['miembro1Par2']?></td>
  <td><?php echo $valores['miembro2Par2']?></td>
  <td><?php echo $valores['nombreCamp']?></td>
  <td><?php echo $valores['resultado']?></td>
</tr>
<form name="x" method="post" action="../controllers/Grupo_Controller.php" name ='show' method="post">
   <h4 id="mensajeEliminar">Inscripciones campeonato</h4>
   <input type="hidden" name = 'codigoPista' value="<?php echo $valores['codigoPista'] ?>" readonly>
   <input type="hidden" name = 'fecha' value="<?php echo $valores['fecha'] ?>" readonly>
   <input type="hidden" name = 'miembro1Par1' value="<?php echo $valores['miembro1Par1'] ?>" readonly>
   <input type="hidden" name = 'miembro2Par1' value="<?php echo $valores['miembro2Par1'] ?>" readonly>
   <input type="hidden" name = 'miembro1Par2' value="<?php echo $valores['miembro1Par2'] ?>" readonly>
   <input type="hidden" name = 'miembro2Par2' value="<?php echo $valores['miembro2Par2'] ?>" readonly>
   <input type="hidden" name = 'nombreCamp' value="<?php echo $valores['nombreCamp'] ?>" readonly>
   <input type="hidden" name = 'resultado' value="<?php echo $valores['resultado'] ?>" readonly>
        </form>


 </td>

<?php echo "</tr>"; } ?>
<center><a href="../controllers/Campeonato_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverEl"></a></center>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
