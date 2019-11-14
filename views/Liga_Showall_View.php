<?php

/**
 *
 */
class LigaShowallView
{

  function __construct($fila, $resultado)
  {
    $this->render($fila, $resultado);
  }

  function render($fila, $resultado){
    include '../views/Header.php';

?>

<table border="1" class="tablaNoticiasTodo">
<tr>
  <th>Participante1</th>
  <th>Participante2</th>
  <th>Campeonato</th>
  <th>Grupo</th>
  <th>Puntos</th>
  <div>
    <a href="../controllers/Campeonato_Controller.php?action=ADD" action="añadir" id = "añadirCampeonato" class="botonAñadirProm"><img src="../img/añadir.png" width="24px" height="24px" ></a>
  </div>
</tr>

<?php
while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$fila['miembro1']."</td>";
      echo "<td>".$fila['miembro2']."</td>";
      echo "<td>".$fila["nombreCamp"]."</td>";
      echo "<td>".$fila["grupo"]."</td>";
      echo "<td>".$fila["puntos"]."</td>";



 ?>

 <td> <form action="../controllers/Liga_Controller.php" name ='DELETE'>
         <input type="hidden" name = 'miembro1' value="<?php echo $fila['miembro1'] ?>" readonly>
         <input type="hidden" name = 'miembro2' value="<?php echo $fila['miembro2'] ?>" readonly>
         <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombreCamp'] ?>" readonly>
         <button class="botonEliminar" name = "action" value = "DELETE">Eliminar</button>
         </form>
 </td>
 <td>
   <form action="../controllers/Liga_Controller.php" name ='EDIT'>
           <input type="hidden" name = 'miembro1' value="<?php echo $fila['miembro1'] ?>" readonly>
           <input type="hidden" name = 'miembro2' value="<?php echo $fila['miembro2'] ?>" readonly>
           <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombreCamp'] ?>" readonly>
           <button class="botonEliminar" name = "action" value = "EDIT">Editar</button>
           </form>
 </td>


<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
