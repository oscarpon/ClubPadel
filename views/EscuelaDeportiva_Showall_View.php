<?php

/**
 *
 */
class EscuelaDeportivaShowallView
{

  function __construct($fila, $resultado)
  {
    $this->render($fila, $resultado);
  }

  function render($fila, $resultado){
    include '../views/Header.php';

?>

<table class="tablaNoticiasTodoLiga">
<tr>
  <th>Nombre</th>
  <th>Horario</th>
  <th>Entrenador</th>
  <th>CodPista</th>
  <th>periodicidad</th>
  <th>minInscritos</th>
  <th>maxInscritos</th>
  <th>Estado</th>
  <th>
    <div>
      <a href="../controllers/GestionEscuela_Controller.php?action=ADD" action="añadir"><img src="../img/añadir.png" width="24px" height="24px" ></a>
    </div>
  </th>
</tr>

<?php
while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$fila['nombre']."</td>";
      echo "<td>".$fila['horario']."</td>";
      echo "<td>".$fila["entrenador"]."</td>";
      echo "<td>".$fila["codigoPista"]."</td>";
      echo "<td>".$fila["periodicidad"]."</td>";
      echo "<td>".$fila["minInscritos"]."</td>";
      echo "<td>".$fila["maxInscritos"]."</td>";
      echo "<td>".$fila["estado"]."</td>";



 ?>

 <td>
  <form action="../controllers/GestionEscuela_Controller.php" name ='DELETE'>
  <input type="hidden" name = 'nombre' value="<?php echo $fila['nombre'] ?>" readonly>
  <button class="botonEliminar" name = "action" value = "DELETE">Eliminar</button>
  </form>
  </td>

 </td>

<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
