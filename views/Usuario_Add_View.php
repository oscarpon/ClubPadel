<?php
class UsuarioAddView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioAñadir">
  <form id="añadir" action='../controllers/Usuario_Controller.php' method='post'>
    <h3 id="nuevoUsuario">Añadir usuario</h3>
    <a href="../controllers/Usuario_Controller.php"><img src="../img/volver.png" width="22px" height="22px" class="botonVolverAñadUsu" ></a>
    <div>
      <div>
        <label></label>
        <input id="nombre" name="nombre" type="text"  aria-describedby="" placeholder="&#x1F464;  Nombre" >
      </div>
      <div>
        <label></label>
        <input id="apellidos" name="apellidos" type="text" aria-describedby="" placeholder="&#128101;  Apellidos">
      </div>
    <div>
      <label></label>
      <input id="clave" name="password" type="password" aria-describedby="" placeholder="&#128273;  Contraseña">
    </div>
    <div>
      <label></label>
      <input id="email" name="email" type="email" aria-describedby="" placeholder="&#64;  Email">
    </div>
    <div id="rol">
      <label>Rol</label>
      <select id="tablaRol" name="rol">
        <option></option>
        <option>Administrador</option>
        <option>Deportista</option>
        <option>Entrenador</option>
      </select>
    </div>
    <div id="genero">
      <label>Género</label>
      <select id="tablaGenero" name="genero">
        <option></option>
        <option>Masculino</option>
        <option>Femenino</option>
        <option>Otro</option>
      </select>
    </div>
  </div>

  <button onclick="validarAñadir" name="action" value="ADD" type="submit" class="botonAñadir">Añadir</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
