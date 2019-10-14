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
      <div id="nombre">
        <label>Nombre</label>
        <input name="nombre" type="text" aria-describedby="" placeholder="Nombre">
      </div>
      <div id="apellidos">
        <label>Apellidos</label>
        <input name="apellidos" type="text" aria-describedby="" placeholder="Apellidos">
      </div>
    <div id="clave">
      <label>Contraseña</label>
      <input name="clave" type="password" aria-describedby="" placeholder="Contraseña">
    </div>
    <div id="email">
      <label>Email</label>
      <input name="email" type="email" aria-describedby="" placeholder="Email">
    </div>
    <div class="row">
      <label>Genero</label>
      <select id="exampleFormControlSelect2">
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
