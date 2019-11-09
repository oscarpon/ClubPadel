<?php
class Noticias_Showall
{

	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}

	function mostrarDatos($fila, $resultado){
    include '../views/Header.php';



?>

<!--
<div class="iconos-superiores">

    <a href="../Controllers/Post_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>
    <a href="../Controllers/Post_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>
-->


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
      echo "<td>".substr($fila["descripcion"], 0, 20)."</td>";


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
