<?php
  class InscripCampAddView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaInscripCamp">
        <tr id="letraInscripCamp">
            <th>Campeonato</th>
            <th>Fecha fin inscripción</th>
            <th>Categoría</th>
            <th>Nivel</th>
            <th>Estado</th>
            <th>Inscripción</th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="usuariosVisibles">
    <td><?php echo $fila['nombre']?> </td>
    <td><?php echo $fila['fechaFinIns']?> </td>
    <td><?php echo $fila['genero']?> </td>
    <td><?php echo $fila['categoria']?> </td>
    <td><?php echo $fila['estado']?> </td>

    <td> <form action="../controllers/InscripCamp_Controller.php" name ='SHOWPAREJA'>
            <input type="hidden" name = 'nombreCamp' value="<?php echo $fila['nombre'] ?>" readonly>
            <input type="hidden" name = 'genero' value="<?php echo $fila['genero'] ?>" readonly>
            <input type="hidden" name = 'categoria' value="<?php echo $fila['categoria'] ?>" readonly>
            <button class="botonShowPareja" name = "action" value = "SHOWPAREJA">Inscribirme</button>
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
