<?php
class PrincipalView
{

	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}

	function mostrarDatos($fila, $resultado){
    include '../views/Header.php';



?>


  <table class="tablaNoticiasTodo">

    <?php

      if($resultado -> num_rows == 0){
        echo '<tr>';
        echo '<td> No tienes noticias ahora mismo. </td>';
        echo '</tr>';
      }
      else{
        ?>
        <tr>
    	    <th>Titulo</th>
    	    <th>Contenido</th>
    	  </tr>
    <?php
      }

  while ($fila = $resultado -> fetch_array())
  {

      echo "<tr>";
      echo "<td>".$fila["titulo"]."</td>";
      echo "<td>".$fila["descripcion"]."</td>";
      echo "</tr>";

?>

<td> <form action="../controllers/Noticias_Controller.php" name ='DELETE'>
				<input type="hidden" name = 'idContenido' value="<?php echo $fila['idContenido'] ?>" readonly>
				<button class="botonEliminar" name = "action" value = "DELETE">Eliminar</button>
				</form>
</td>


<?php
      echo "</tr>";
     }

?>
  </table>




<div>
<?php
include '../views/Footer.php';
?>
</div>
<?php
  }
}
?>
