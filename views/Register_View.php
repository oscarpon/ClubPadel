<?php
class Register{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioRegistro">
  <form>
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre</label>
  <input type="text" class="form-control" id="" aria-describedby="" placeholder="Nombre">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Apellidos</label>
  <input type="text" class="form-control" id="" aria-describedby="" placeholder="Apellidos">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Contraseña</label>
  <input type="password" class="form-control" id="" aria-describedby="" placeholder="Contraseña">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
  <input type="email" class="form-control" id="" aria-describedby="" placeholder="Email">
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect2">Genero</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option></option>
      <option>Masculino</option>
      <option>Femenino</option>
      <option>Otro</option>
    </select>
  </div>
  <button type="submit" class="btn btn-dark">Registrar</button>


  </form>

</div>




<?php
include '../views/Footer.php';
  }
}


 ?>
