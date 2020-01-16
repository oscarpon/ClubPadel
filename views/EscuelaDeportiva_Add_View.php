<?php
/**
 *
 */
class EscuelaDeportivaAddView
{

  function __construct()
  {
    $this->render();
  }

  function render(){
    include '../views/Header.php';

    $fecha = date("Y-m-d H:i");

  ?>

<div class="">
  <form class="formularioAñadirCamp" action="../controllers/GestionEscuela_Controller.php?action=ADD" method="post">
      <input type="text" name="nombre" placeholder="Nombre Escuela Deportiva">
      <input type="datetime-local" name="horario" placeholder="Horario inicio" min="<?php echo $fecha;?>">
      <input type="email" name="entrenador" placeholder="Entrenador email">
      <input type="text" name="codigoPista" placeholder="codigo Pista">
      <input type="text" name="periodicidad" placeholder="periodicidad" maxlength="1">
      <input type="text" name="minInscritos" placeholder="Minimo Inscritos" maxlength="2">
      <input type="text" name="maxInscritos" placeholder="Maximo Inscritos" maxlength="2">
      <input type="hidden" name="estado" placeholder="estado" value="abierto">
      <button class="botonAñadirCamp" type="submit" name="button" >Añadir</button>
  </form>
</div>

<?php
include '../views/Footer.php';
  }
}



 ?>
