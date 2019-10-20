<?php
  class InscripcionPartidoShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaPromocion">
        <tr id="letraPromocion">
            <th>Fecha de oferta</th>
            <th>Participante 1</th>
            <th>Participante 2</th>
            <th>Participante 3</th>
            <th>Participante 4</th>
            <th>
              <div>
                <a href="../controllers/PromocionPartido_Controller.php?action=ADD" action="ADD" id = "añadirPromocion"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="usuariosVisibles">
    <td><?php echo $fila['fecha']?> </td>
    <td><?php echo $fila['partic1']?> </td>
    <td><?php echo $fila['partic2']?> </td>
    <td><?php echo $fila['partic3']?> </td>
    <td><?php echo $fila['partic4']?> </td>

    <td> <form action="../controllers/InscripcionPartido_Controller.php" name ='EDIT'>
            <input type="hidden" name = 'email' value="<?php echo $fila['email'] ?>" readonly>
            <input type="hidden" name = 'fecha' value="<?php echo $fila['fecha'] ?>" readonly>
            <input type="hidden" name = 'tipo' value="<?php echo $fila['tipo'] ?>" readonly>
            <input type="hidden" name = 'partic1' value="<?php echo $fila['partic1'] ?>" readonly>
            <input type="hidden" name = 'partic2' value="<?php echo $fila['partic2'] ?>" readonly>
            <input type="hidden" name = 'partic3' value="<?php echo $fila['partic3'] ?>" readonly>
            <input type="hidden" name = 'partic4' value="<?php echo $fila['partic4'] ?>" readonly>
            <input type="hidden" name = 'numpart' value="<?php echo $fila['numpart'] ?>" readonly>
            <button class="botonInscribir" name = "action" value = "EDIT">Inscribirse</button>
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
