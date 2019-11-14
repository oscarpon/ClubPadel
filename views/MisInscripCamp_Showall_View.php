<?php
  class MisInscripCampShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaMisInscripCamp">
        <tr id="letraInscripCamp">
            <th>Miembro 1</th>
            <th>Miembro 2</th>
            <th>Campeonato</th>
            <th>
              <div>
                <a href="../controllers/InscripCamp_Controller.php?action=ADD" action="ADD" id = "añadirInscrip"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="inscripCampVisibles">
    <td><?php echo $fila['miembro1']?> </td>
    <td><?php echo $fila['miembro2']?> </td>
    <td><?php echo $fila['nombreCamp']?> </td>

    <td> <form action="../controllers/InscripCamp_Controller.php" name ='DELETE'>
            <input type="hidden" name = 'miembro1' value="<?php echo $fila['miembro1'] ?>" readonly>
            <input type="hidden" name = 'miembro2' value="<?php echo $fila['miembro2'] ?>" readonly>
            <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombreCamp'] ?>" readonly>
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
