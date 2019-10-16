<?php
  class UsuarioShowallView{
    function __construct($datos){
      $this->render($datos);
    }
    function render($datos){
      include "../views/Header.php";

 ?>

<table class="tablaUsuarios">
        <tr id="letraUsuarios">
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Genero</th>
            <th>
              <div>
                <a href="../controllers/Usuario_Controller.php?action=ADD" action="ADD" id = "añadirUsuario"><img src="../img/añadir.png" width="24px" height="24px" ></a>
              </div>
            </th>
        </tr>
<?php
  while($fila = mysqli_fetch_array($datos)){
?>

<tr class="usuariosVisibles">
    <td><?php echo $fila['nombre']?> </td>
    <td><?php echo $fila['apellidos']?> </td>
    <td><?php echo $fila['email']?> </td>
    <td><?php echo $fila['rol']?> </td>
    <td><?php echo $fila['genero']?> </td>

    <td> <form action="../controllers/Usuario_Controller.php" name ='DELETE'>
            <input type="hidden" name = 'email' value="<?php echo $fila['email'] ?>" readonly>
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
