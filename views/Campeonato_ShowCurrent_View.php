<?php

/**
 *
 */
class CampeonatoShowCurrentView
{

  function __construct($resultado)
  {
    $this->render($resultado);
  }

  function render($resultado){
    include '../views/Header.php';
    $fila = $resultado->fetch_assoc();
    $nombreCamp = $fila['nombreCamp'];
?>
<table border="1" class="tablaCampeonatoTodo">
<tr>
  <th>Participante1</th>
  <th>Participante2</th>
  <th>Campeonato</th>
  <th>Grupo</th>
  <th>Puntos</th>
  <th id="botonesCuadroCamp">
      <form action="../controllers/Campeonato_Controller.php" name ='generarPartidos'>
      <input type="hidden" name = 'nombre' value="<?php echo $nombreCamp ?>" readonly>
      <button class="botonGenerar" name = "action" value = "generarPartidos">Generar</button>
      </form>
  </th>
  <th id="botonesCuadroCamp">
      <form action="../controllers/Campeonato_Controller.php" name ='verPartidos'>
      <input type="hidden" name = 'nombre' value="<?php echo $nombreCamp ?>" readonly>
      <button class="botonVerPartidos" name = "action" value = "verPartidos">Ver partidos</button>
      </form>
  </th>
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

<?php echo "</tr>"; } ?>

</table>

<?php
include '../views/Footer.php';
  }
}



 ?>
