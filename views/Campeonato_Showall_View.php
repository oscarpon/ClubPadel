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

<table class="tablaNoticiasTodo">
<tr>
  <th>Nombre</th>
  <th>Fecha Fin Inscripcion</th>
  <th>Nivel</th>
  <th>Categoría</th>
  <th>Estado</th>
  <th>Opciones</th>
  <th>
    <div>
      <a href="../controllers/Campeonato_Controller.php?action=ADD" action="añadir"><img src="../img/añadir.png" width="24px" height="24px" ></a>
    </div>
  </th>
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
  <form action="../controllers/Campeonato_Controller.php" name ='DELETE'>
  <input type="hidden" name = 'nombre' value="<?php echo $fila['nombre'] ?>" readonly>
  <button class="botonEliminar" name = "action" value = "DELETE">Eliminar</button>
  </form>
  </td>
  <td>
    <form action="../controllers/Campeonato_Controller.php" name ='crearGrupos'>
   <input type="hidden" name = 'nombre' value="<?php echo $fila['nombre'] ?>" readonly>
   <button class="botonEliminar" name = "action" value = "crearGrupos">Grupos</button>
   </form>
  </td>
      <td>
        <form action="../controllers/Campeonato_Controller.php" name ='verGrupos'>
       <input type="hidden" name = 'nombre' value="<?php echo $fila['nombre'] ?>" readonly>
       <button class="botonEliminar" name = "action" value = "verGrupos">Ver</button>
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
