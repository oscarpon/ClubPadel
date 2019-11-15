<?php

/**
 *
 */
class CampeonatoCurrentView
{

  function __construct($fila, $resultado)
  {
    $this->render($fila, $resultado);
  }

  function render($fila, $resultado){
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


 </td>

<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
