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
      <p>
      <label><input type="checkbox" id="categoria" name="principiante" value="1">Principiante</label>
      <label><input type="checkbox" id="categoria" name="medio" value="2"> Medio</label>
      <label><input type="checkbox" id="categoria" name="profesional" value="3"> Profesional</label>
      </p>

      <p>
      <label><input type="checkbox" id="genero" name="masculino" value="M"> Masculino</label>
      <label><input type="checkbox" id="genero" name="femenino" value="F"> Femenino</label>
      <label><input type="checkbox" id="genero" name="mixto" value="X"> Mixto</label>
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
