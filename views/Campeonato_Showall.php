<?php

/**
 *
 */
class CampeonatoShowall
{

  function __construct($tupla, $result)
  {
    $this->showall($tupla, $result);
  }

  function showall($tupla, $result){
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
while ($tupla = $result->fetch_assoc()) {
  echo "<tr>";
      echo "<td>".$tupla['nombre']."</td>";
      echo "<td>".$tupla["FechaFinIns"]."</td>";
      echo "<td>".$tupla["categoria"]."</td>";
      echo "<td>".$tupla["genero"]."</td>";


 ?>

<td>
  <a href="../controllers/Campeonato_Controller.php?action=borrar&nombre=<?php  echo $fila['nombre'] ?>">Borrar</a>
        <a href="../controllers/Campeonato_Controller.php?action=registrar&nombre=<?php  echo $fila['nombre'] ?>">Registrar</a>
</td>

<?php echo "</tr>"; } ?>

</table>





<?php
include "../views/Footer.php";
  }
}



 ?>
