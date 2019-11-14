<?php
/**
 *
 */
class CampeonatoAddView
{

  function __construct()
  {
    $this->render();
  }

  function render(){
    include '../views/Header.php';

  ?>

<div class="">
  <form class="formularioAñadir" action="../controllers/Campeonato_Controller.php?action=ADD" method="post">
      <input type="text" name="nombre" placeholder="Nombre Campeonato">
      <input type="date" name="fechaFinIns" placeholder="Fecha fin Inscripcion">
      <select class="" name="categoria">
        <option value="">--Categoria--</option>
        <option value="1">Principiante</option>
        <option value="2">Medio</option>
        <option value="3">Profesional</option>
      </select>
      <select class="" name="genero">
        <option value="">--Genero--</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="X">Mixto</option>
      </select>
      <input type="hidden" name="estado" placeholder="estado" value="NJ">
      <button type="submit" name="button" >Añadir</button>
  </form>
</div>

<?php
include '../views/Footer.php';
  }
}



 ?>
