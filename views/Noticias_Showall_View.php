<?php
class NoticiasShowallView
{

	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}

	function mostrarDatos($fila, $resultado){
    include '../views/Header.php';



?>


  <table class="tablaNoticiasTodo">
	  <tr>
	    <th>Código</th>
	    <th>Titulo</th>
	    <th>Contenido</th>
			<th>
				<div>
					<a href="../controllers/Noticias_Controller.php?action=ADD" action="ADD" id = "añadirNoticia"><img src="../img/añadir.png" width="24px" height="24px" ></a>
				</div>
			</th>
	  </tr>


<?php


  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila['idContenido']."</td>";
      echo "<td>".$fila["titulo"]."</td>";
      echo "<td>".$fila["descripcion"]."</td>";


?>
	<td>
		<form action="../controllers/PromocionPartido_Controller.php" name ='DELETE'>
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
