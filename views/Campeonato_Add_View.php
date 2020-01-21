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

    $fecha = date("Y-m-d");

  ?>

<div class="">
  <form class="formularioAñadirCamp" action="../controllers/Campeonato_Controller.php?action=ADD" method="post">
      <input type="text" name="nombre" placeholder="Nombre Campeonato">
      <input type="date" name="fechaFinIns" placeholder="Fecha fin Inscripcion" min="<?php echo $fecha;?>">
      <p class="categoriaCheckbox">
        <label for="principiante">
          <span class="check"></span>
          <input type="checkbox" id="principiante" name="principiante" value="1">Principiante
        </label>
        <label for="medio">
          <span class="check"></span>
          <input type="checkbox" id="medio" name="medio" value="2"> Medio
        </label>
        <label for="profesional">
          <span class="check"></span>
          <input type="checkbox" id="profesional" name="profesional" value="3"> Profesional
        </label>
      </p>

      <p class="generoCheckbox">
        <label for="masc">
          <span></span>
          <input type="checkbox" id="masc" name="masculino" value="M"> Masculino
        </label>
        <label for="fem">
          <span></span>
          <input type="checkbox" id="fem" name="femenino" value="F"> Femenino
        </label>
        <label for="mix">
          <span></span>
          <input type="checkbox" id="mix" name="mixto" value="X"> Mixto
        </label>
      </p>
      <input type="hidden" name="estado" placeholder="estado" value="abierto">
      <button class="botonAñadirCamp" type="submit" name="button" >Añadir</button>
  </form>
</div>

<?php
include '../views/Footer.php';
  }
}



 ?>
