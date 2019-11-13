<?php
  class InscripParejaAddView{
    function __construct($datos, $nombreCamp){
      $this->render($datos, $nombreCamp);
    }
    function render($datos, $nombreCamp){
      include "../views/Header.php";

 ?>

<table class="tablaParejasCamp">
        <tr id="letraParejasCamp">
            <th>Miembro 1</th>
            <th>Miembro 2</th>
            <th>Categoria</th>
            <th>Nivel</th>
            <th>Elegir pareja</th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="parejasVisibles">
    <td><?php echo $fila['miembro1']?> </td>
    <td><?php echo $fila['miembro2']?> </td>
    <td><?php echo $fila['genero']?> </td>
    <td><?php echo $fila['nivel']?> </td>

    <td> <form action="../controllers/InscripCamp_Controller.php" name ='ADD' method="post">
            <input type="hidden" name = 'miembro1' value="<?php echo $fila['miembro1'] ?>" readonly>
            <input type="hidden" name = 'miembro2' value="<?php echo $fila['miembro2'] ?>" readonly>
            <input type="hidden" name = 'nombreCamp' value="<?php echo $nombreCamp ?>" readonly>
            <button class="botonElegir" name = "action" value = "ADD">Elegir</button>
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
