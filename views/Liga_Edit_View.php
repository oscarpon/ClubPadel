<?php
/**
*
*/
class LigaEditView
{

	function __construct($valores){
		$this->render($valores);
	}
	function render($valores){
		include '../Views/Header.php';
?>


<div class="formulario">


		<form class="tablaNoticiasTodo" method="post" action="../Controllers/Liga_Controller.php?action=EDIT" onsubmit="return validar();">


        Miembro 1
        <input type="text" id="miembro1" name="miembro1" class="form-control" readonly value="<?php echo $valores[0] ?>" >
        Miembro 2
		  	<input type="text" id="miembro2" name="miembro2" required class="form-control" readonly value="<?php echo $valores[1] ?>">
        Campeonato
		  	<input type="text" id="nombreCamp" name="nombreCamp" required class="form-control" readonly value="<?php echo $valores[2] ?>"  >
        Grupo
        <input type="text" id="grupo" name="grupo" required class="form-control"readonly value="<?php echo $valores[3] ?>"  >
        Puntos
        <input type="text" id="puntos" name="puntos" required class="form-control" value="<?php echo $valores[4] ?>"  >







		   <button type="submit" class="">Guardar</button>

		   <p>

		   </p>
		   <br>
		   <br>
		</form>
    <a href="../controllers/Liga_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverOfPar" ></a>





</div>




<?php
include '../Views/Footer.php';
?>


<?php
}
}
?>
