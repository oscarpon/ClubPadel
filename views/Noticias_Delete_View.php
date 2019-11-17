<?php
class NoticiasDeleteView
{

	function __construct($valores)
	{
		$this->mostrarFila($valores);
	}

	function mostrarFila($valores){
    include '../views/Header.php';
?>

<cuerpo>
<div class="tablaNoticiasEl">
<center>
<table>
	<tr id="titulosTabCampeonato">
		<th>idContenido</th>
		<th>Titulo</th>
		<th>Descripcion</th>
		<th>Email</th>
	</tr>
	<tr>
		<td><?php echo $valores['idContenido']?></td>
		<td><?php echo $valores['titulo']?></td>
		<td><?php echo $valores['descripcion']?></td>
		<td><?php echo $valores['email']?></td>
	</tr>
</table>


<form name="x" method="post" action="../controllers/Noticias_Controller.php" name ='DELETE' method="post">
	 <h4 id="mensajeEliminarNoticia">¿Desea borrar esta noticia?</h4>
	 <input type="hidden" name = 'idContenido' value="<?php echo $valores['idContenido'] ?>" readonly>
	 <input type="hidden" name = 'titulo' value="<?php echo $valores['titulo'] ?>" readonly>
	 <input type="hidden" name = 'descripcion' value="<?php echo $valores['descripcion'] ?>" readonly>
	 <input type="hidden" name = 'email' value="<?php echo $valores['email'] ?>" readonly>
				<button name = "action" value = "DELETE" ><img src="../img/tic.png" width="24px" height="24px" id="ticConfirmarNoticia"></button>
				</form>
<center>
	<a href="../controllers/Noticias_Controller.php"><img src="../img/volver.png" width="21px" height="21px" class="botonVolverEl"></a></center>

</center>
		</div>
</cuerpo>


<?php
include '../views/Footer.php';

  }
}
?>
