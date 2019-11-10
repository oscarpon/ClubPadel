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
  <form class="formularioAñadir" action="../controllers/Campeonato_Controller.php?action=añadir" method="post">
      <input type="text" name="nombre" placeholder="Nombre Campeonato">
      <input type="date" name="fechaFinIns" placeholder="Fecha fin Inscripcion">
      <input type="text" name="categoria" placeholder="Categoria">
      <input type="text" name="estado" placeholder="estado">
      <button type="submit" name="button">Añadir</button>
  </form>
</div>

<?php
include '../views/Footer.php';
  }
}



 ?>
