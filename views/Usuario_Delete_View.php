<?php

    class UsuarioDeleteView{
        function __construct($valores){
            $this->render($valores);
        }
    function render($valores) {

        include "../views/Header.php";

?>
    <cuerpo>
<div class="scroll">
    <center>
		<table border="1">
			<tr>
				<th>Email</th>
				<th>Password</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Rol</th>
				<th>Genero</th>
			</tr>

			<tr>
				<td><?php echo $valores['email'] ?></td>
				<td><?php echo $valores['password'] ?></td>
				<td><?php echo $valores['nombre'] ?></td>
				<td><?php echo $valores['apellidos'] ?></td>
				<td><?php echo $valores['rol'] ?></td>
				<td><?php echo $valores['genero'] ?></td>
			</tr>

            </table>
            <br>
        <form action="../controllers/Usuario_Controller.php" name ='DELETE' method="post">
            <input type="hidden" name = 'email' value="<?php echo $valores['email'] ?>" readonly>
            <input type="hidden" name = 'password' value="<?php echo $valores['password'] ?>" readonly>
            <input type="hidden" name = 'nombre' value="<?php echo $valores['nombre'] ?>" readonly>
            <input type="hidden" name = 'apellidos' value="<?php echo $valores['apellidos'] ?>" readonly>
            <input type="hidden" name = 'rol' value="<?php echo $valores['rol'] ?>" readonly>
            <input type="hidden" name = 'genero' value="<?php echo $valores['genero'] ?>" readonly>
            <h4>¿Desea borrar este usuario?</h4>
            <button name = "action" value = "DELETE" ><img src="../img/borrar.svg" width="30px" height="30px" ></button>
            </form>
            <center><button name = "action" onclick="location= '../controllers/Usuario_Controller.php'" ><img src="../img/volver.png" width="30px" height="30px" ></button></center>

    </center>
        </div>
    </cuerpo>

<?php
        include "../views/Footer.php";
    }

    }
 ?>
