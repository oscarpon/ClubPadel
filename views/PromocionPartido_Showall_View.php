<?php
  class PromocionPartidoShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaPromocion">
        <tr id="letraPromocion">
            <th>Usuario</th>
            <th>Fecha de oferta</th>
            <th>Participante 1</th>
            <th>Participante 2</th>
            <th>Participante 3</th>
            <th>Participante 4</th>
            <th>Participantes</th>
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
    <td><?php echo $fila['email']?> </td>
    <td><?php echo $fila['fecha']?> </td>
    <td><?php echo $fila['partic1']?> </td>
    <td><?php echo $fila['partic2']?> </td>
    <td><?php echo $fila['partic3']?> </td>
    <td><?php echo $fila['partic4']?> </td>
    <td><?php echo $fila['numpart']?> </td>

    <td> <form action="../controllers/PromocionPartido_Controller.php" name ='DELETE'>
            <input type="hidden" name = 'email' value="<?php echo $fila['email'] ?>" readonly>
            <input type="hidden" name = 'fecha' value="<?php echo $fila['fecha'] ?>" readonly>
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
