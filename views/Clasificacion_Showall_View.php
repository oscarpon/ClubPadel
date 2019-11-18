<?php

/**
 *
 */
class ClasificacionShowallView
{

  function __construct($resultado)
  {
    $this->render($resultado);
  }

  function render($resultado){
    include '../views/Header.php';

?>

<table border="1" class="tablaClasificacionTodo">
<tr>
  <th>CodPista</th>
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
      echo "<td>".$fila['codigoPista']."</td>";
      echo "<td>".$fila['fecha']."</td>";
      echo "<td>".$fila["miembro1Par1"]."</td>";
      echo "<td>".$fila["miembro2Par1"]."</td>";
      echo "<td>".$fila["miembro1Par2"]."</td>";
      echo "<td>".$fila["miembro2Par2"]."</td>";
      echo "<td>".$fila["nombreCamp"]."</td>";
      echo "<td>".$fila["resultado"]."</td>";



 ?>

<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
