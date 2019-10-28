<?php
class Noticias_Eliminar
{

	function __construct($datos)
	{
		$this->mostrarFila($datos);
	}

	function mostrarFila($datos){
    include '../views/Header.php';
?>

<form name="x" method="post" action="../controllers/Noticias_Controller.php?action=DELETE">

           <input type="hidden" name="idContenido" value="<?php echo $datos[0];?>">

</form>
    <table>
               <tr>
                <th>Codigo</th>
                <td><?php echo $datos[0];?></td>
              </tr>
               <tr>
                <th>Titulo</th>
                <td><?php echo $datos[1];?></td>
              </tr>
               <tr>
                <th>Descripcion</th>
                <td><?php echo $datos[2];?></td>
              </tr>
  </table>



<?php
include '../views/Footer.php';

  }
}
?>
