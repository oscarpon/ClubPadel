<?php
class Register{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioRegister">
  <form id="registro" action='../controllers/Register_Controller.php' method='post'>
    <h3 id="nuevoUsuario">Nuevo usuario</h3>
    <div>
      <div>
        <label></label>
        <input id="nombre" name="nombre" type="text" aria-describedby="" placeholder="&#x1F464;  Nombre">
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

  <button onclick="validarRegister" type="submit" class="botonRegistrar">Registrar</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}


 ?>
