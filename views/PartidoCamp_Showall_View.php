<?php

class PartidoCampShowallView
{

  function __construct($resultado)
  {
    $this->render($resultado);
  }

  function render($resultado){
    include '../views/Header.php';

?>

<table border="1" class="tablaPartidoCamp">
<tr>
  <th>Pista</th>
  <th>Fecha</th>
  <th>Miembro 1 Par 1</th>
  <th>Miembro 2 Par 1</th>
  <th>Miembro 1 Par 2</th>
  <th>Miembro 2 Par 2</th>
  <th>Campeonato</th>
  <th>Resultado</th>
</tr>

<?php
while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$fila["codigoPista"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";
      echo "<td>".$fila["miembro1Par1"]."</td>";
      echo "<td>".$fila["miembro2Par1"]."</td>";
      echo "<td>".$fila["miembro1Par2"]."</td>";
      echo "<td>".$fila["miembro2Par2"]."</td>";
      echo "<td>".$fila["nombreCamp"]."</td>";
      echo "<td>".$fila["resultado"]."</td>";

 ?>

  <td>
    <form action="../controllers/Campeonato_Controller.php" name ='EDIT'>
      <input type="hidden" name = 'codigoPista' value="<?php echo $fila['codigoPista'] ?>" readonly>
      <input type="hidden" name = 'fecha' value="<?php echo $fila['fecha'] ?>" readonly>
      <input type="hidden" name = 'miembro1Par1' value="<?php echo $fila['miembro1Par1'] ?>" readonly>
      <input type="hidden" name = 'miembro2Par1' value="<?php echo $fila['miembro2Par1'] ?>" readonly>
      <input type="hidden" name = 'miembro1Par2' value="<?php echo $fila['miembro1Par2'] ?>" readonly>
      <input type="hidden" name = 'miembro2Par2' value="<?php echo $fila['miembro2Par2'] ?>" readonly>
      <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombreCamp'] ?>" readonly>
      <input type="hidden" name = 'resultado' value="<?php echo $fila['resultado'] ?>" readonly>
      <button class="botonEditPartidoCamp" name = "action" value = "EDIT">Resultado</button>
    </form>
  </td>

<?php echo "</tr>"; } ?>

</table>

<?php
include '../views/Footer.php';
  }
}

 ?>
