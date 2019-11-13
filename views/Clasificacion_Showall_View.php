<?php

/**
 *
 */
class ClasificacionShowallView
{

  function __construct($fila, $resultado)
  {
    $this->render($fila, $resultado);
  }

  function render($fila, $resultado){
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
      echo "<td>".$fila['codPista']."</td>";
      echo "<td>".$fila['fecha']."</td>";
      echo "<td>".$fila["miembro1Par1"]."</td>";
      echo "<td>".$fila["miembro2Par1"]."</td>";
      echo "<td>".$fila["miembro1Par2"]."</td>";
      echo "<td>".$fila["miembro2Par2"]."</td>";
      echo "<td>".$fila["nombreCamp"]."</td>";
      echo "<td>".$fila["resultado"]."</td>";



 ?>

 <td> <form action="../controllers/Campeonato_Controller.php" name ='DELETE'>
         <input type="hidden" name = 'nombre' value="<?php echo $fila['nombre'] ?>" readonly>
         <button class="botonEliminar" name = "action" value = "DELETE">Eliminar</button>
         </form>
 </td>

<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
