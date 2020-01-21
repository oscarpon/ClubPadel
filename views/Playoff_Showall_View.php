<?php

class PlayoffShowallView
{

  function __construct($resultado)
  {
    $this->render($resultado);
  }

  function render($resultado){
    include '../views/Header.php';

?>

<table border="1" class="tablaPlayoffTodo">
<tr>
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
      echo "<td>".$fila["miembro1Par1"]."</td>";
      echo "<td>".$fila["miembro2Par1"]."</td>";
      echo "<td>".$fila["miembro1Par2"]."</td>";
      echo "<td>".$fila["miembro2Par2"]."</td>";
      echo "<td>".$fila["nombreCamp"]."</td>";
      echo "<td>".$fila["resultado"]."</td>";

 ?>

  <td>
    <form action="../controllers/Playoff_Controller.php" name ='EDIT'>
      <input type="hidden" name = 'idPlayoff' value="<?php echo $fila['idPlayoff'] ?>" readonly>
      <input type="hidden" name = 'resultado' value="<?php echo $fila['resultado'] ?>" readonly>
      <button class="botonResulPlayoffs" name = "action" value = "EDIT">Resultado</button>
    </form>
  </td>

<?php echo "</tr>"; } ?>

</table>

<?php
include '../views/Footer.php';
  }
}

 ?>
