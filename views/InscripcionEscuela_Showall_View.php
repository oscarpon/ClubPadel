<?php
  class InscripcionEscuelaShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaInscripcionEscuela">
        <tr id="letraInscripcionEscuela">
            <th>Escuela</th>
            <th>Horario</th>
            <th>
              <div>
                <a href="../controllers/InscripcionEscuela_Controller.php?action=ADD" action="añadir"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="usuariosVisiblesCamp">
    <td><?php echo $fila['nombre']?> </td>
    <td><?php echo $fila['horario']?> </td>
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
