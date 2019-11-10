<?php

/**
 *
 */
class CampeonatoShowallView
{

  function __construct($fila, $resultado)
  {
    $this->render($fila, $resultado);
  }

  function render($fila, $resultado){
    include '../views/Header.php';

?>

<table>
<tr>
  <th>nombre</th>
  <th>Fecha Fin Inscripcion</th>
  <th>Categoria</th>
  <th>Genero</th>
  <th>Estado</th>
</tr>

<?php
while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$fila['nombre']."</td>";
      echo "<td>".$fila['fechaFinIns']."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["genero"]."</td>";
      echo "<td>".$fila["estado"]."</td>";



 ?>

<td>
  <a href="../controllers/Campeonato_Controller.php?action=borrar&nombre=<?php  echo $fila['nombre'] ?>">Borrar</a>
  <a href="../controllers/Campeonato_Controller.php?action=registrar&nombre=<?php  echo $fila['nombre'] ?>">Registrar</a>
</td>

<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
