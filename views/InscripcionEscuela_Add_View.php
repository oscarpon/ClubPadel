<?php
  class InscripcionEscuelaAddView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaEscuela">
        <tr id="letraEscuela">
            <th>Escuela</th>
            <th>Horario</th>
            <th>Entrenador</th>
            <th>Pista</th>
            <th>Periodicidad</th>
            <th>Mínimo inscritos</th>
            <th>Máximo inscritos</th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="escuelasVisibles">
    <td><?php echo $fila['nombre']?> </td>
    <td><?php echo $fila['horario']?> </td>
    <td><?php echo $fila['entrenador']?> </td>
    <td><?php echo $fila['codigoPista']?> </td>
    <td><?php echo $fila['periodicidad']?> </td>
    <td><?php echo $fila['minInscritos']?> </td>
    <td><?php echo $fila['maxInscritos']?> </td>

    <td> <form action="../controllers/InscripcionEscuela_Controller.php" name ='ADD' method="post">
            <input type="hidden" name = 'nombre' value="<?php echo $fila['nombre'] ?>" readonly>
            <input type="hidden" name = 'horario' value="<?php echo $fila['horario'] ?>" readonly>
            <button class="botonInscribirEscuela" name = "action" value = "ADD">Inscribirme</button>
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
