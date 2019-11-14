<?php
  class ParejaShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaParejas">
        <tr id="letraParejas">
            <th>Miembro 1</th>
            <th>Miembro 2</th>
            <th>Categoría</th>
            <th>Nivel</th>
            <th>
              <div>
                <a href="../controllers/Pareja_Controller.php?action=ADD" action="ADD" id = "añadirPareja"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="usuariosVisibles">
    <td><?php echo $fila['miembro1']?> </td>
    <td><?php echo $fila['miembro2']?> </td>
    <td><?php echo $fila['genero']?> </td>
    <td><?php echo $fila['nivel']?> </td>

    <td> <form action="../controllers/Pareja_Controller.php" name ='DELETE'>
            <input type="hidden" name = 'miembro1' value="<?php echo $fila['miembro1'] ?>" readonly>
            <input type="hidden" name = 'miembro2' value="<?php echo $fila['miembro2'] ?>" readonly>
            <input type="hidden" name = 'genero' value="<?php echo $fila['genero'] ?>" readonly>
            <input type="hidden" name = 'nivel' value="<?php echo $fila['nivel'] ?>" readonly>
            <button class="botonEliminar" name = "action" value = "DELETE">Eliminar</button>
            </form>
    </td>
</tr>

<?php
       }
       ?>
   </table>

   </div>

<?php


       include "../views/Footer.php";
   }
}
?>
