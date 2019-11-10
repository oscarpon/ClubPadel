<?php
  class PagoShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaPagoTodo">
        <tr id="letraPago">
            <th>Email</th>
            <th>Fecha operación</th>
            <th>Importe</th>
            <th>Pagado</th>
            <th>
              <div>
                <a href="../controllers/Pago_Controller.php?action=ADD" action="ADD" id = "añadirPago"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="pagosVisibles">
    <td><?php echo $fila['email']?> </td>
    <td><?php echo $fila['fecha']?> </td>
    <td><?php echo $fila['importe']?> </td>
    <td><?php echo $fila['pagado']?> </td>

    <td> <form action="../controllers/Pago_Controller.php" name ='EDIT'>
            <input type="hidden" name = 'email' value="<?php echo $fila['email'] ?>" readonly>
            <input type="hidden" name = 'fecha' value="<?php echo $fila['fecha'] ?>" readonly>
            <input type="hidden" name = 'importe' value="<?php echo $fila['importe'] ?>" readonly>
            <input type="hidden" name = 'pago' value="<?php echo $fila['pago'] ?>" readonly>
            <button class="botonConfirmar" name = "action" value = "EDIT">Confirmar</button>
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
