<?php

/**
 *
 */
class PlayoffGrupoShowcurrentView
{

  function __construct($datos)
  {
    $this->render($datos);
  }

  function render($datos){
    include '../views/Header.php';

?>

<table class="tablaPlayoffGrupo">
  <tr>
    <th>Nombre</th>
    <th>Grupo</th>
    <th>Opciones</th>
  </tr>

<?php
while ($fila = $datos->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$fila['nombreCamp']."</td>";
      echo "<td>".$fila["grupo"]."</td>";

 ?>

  <td>
    <form action="../controllers/Playoff_Controller.php" name ='generarPlayoffs' method="post">
       <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombreCamp'] ?>" readonly>
       <input type="hidden" name = 'grupo' value="<?php echo $fila['grupo'] ?>" readonly>
       <button class="botonPlayoffsGenerar" name = "action" value = "generarPlayoffs">Generar</button>
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
