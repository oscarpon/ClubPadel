<?php

/**
 *
 */
class PlayoffCampShowallView
{

  function __construct($datos)
  {
    $this->render($datos);
  }

  function render($datos){
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
</tr>

<?php
while ($fila = $datos->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$fila['nombre']."</td>";
      echo "<td>".$fila['fechaFinIns']."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["genero"]."</td>";
      echo "<td>".$fila["estado"]."</td>";



 ?>

  <td>
    <form action="../controllers/Playoff_Controller.php" name ='generarPlayoffs'>
   <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombre'] ?>" readonly>
   <button class="botonPlayoffs" name = "action" value = "generarPlayoffs">Playoffs</button>
   </form>
  </td>
      <td>
        <form action="../controllers/Playoff_Controller.php" name ='verPlayoffs'>
       <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombre'] ?>" readonly>
       <button class="botonVer" name = "action" value = "verPlayoffs">Ver</button>
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
