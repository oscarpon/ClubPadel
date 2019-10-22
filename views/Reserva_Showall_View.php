<?php
  class ReservaShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaReserva">
        <tr id="letraReserva">
            <th>Email</th>
            <th>Codigo de pista</th>
            <th>Fecha</th>
            <th>
              <div>
                <a href="../controllers/Reserva_Controller.php?action=ADD" action="ADD" id = "añadirPromocion"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="usuariosVisibles">
    <td><?php echo $fila['email']?> </td>
    <td><?php echo $fila['codigoPista']?> </td>
    <td><?php echo $fila['fecha']?> </td>
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
