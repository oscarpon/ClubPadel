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

<table border="1" class="tablaNoticiasTodo">
<tr>
  <th>nombre</th>
  <th>Fecha Fin Inscripcion</th>
  <th>Categoria</th>
  <th>Genero</th>
  <th>Estado</th>
  <th>Opciones</th>
  <div>
    <a href="../controllers/Campeonato_Controller.php?action=añadir" action="añadir" id = "añadirCampeonato" class="botonAñadirProm"><img src="../img/añadir.png" width="24px" height="24px" ></a>
  </div>
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
  <a href="../controllers/Campeonato_Controller.php?action=borrar=<?php  echo $fila['nombre'] ?>">Borrar</a>
  <a href="../controllers/Campeonato_Controller.php?action=registrar=<?php  echo $fila['nombre'] ?>">Registrar</a>
</td>

<?php echo "</tr>"; } ?>

</table>





<?php
include '../views/Footer.php';
  }
}



 ?>
