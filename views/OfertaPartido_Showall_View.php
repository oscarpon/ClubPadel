<?php
  class OfertaPartidoShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaOferta">
        <tr id="letraOferta">
            <th>Usuario</th>
            <th>Fecha de oferta</th>
            <th>Pareja</th>
            <th>Contrincante 1</th>
            <th>Contrincante 2</th>
            <th>Participantes</th>
            <th>
              <div>
                <a href="../controllers/OfertaPartido_Controller.php?action=ADD" action="ADD" id = "añadirOferta"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="ofertasVisibles">
    <td><?php echo $fila['email']?> </td>
    <td><?php echo $fila['fecha']?> </td>
    <td><?php echo $fila['partic2']?> </td>
    <td><?php echo $fila['partic3']?> </td>
    <td><?php echo $fila['partic4']?> </td>
    <td><?php echo $fila['numpart']?> </td>

    <td> <form action="../controllers/OfertaPartido_Controller.php" name ='DELETE'>
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
