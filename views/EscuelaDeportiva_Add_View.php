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




  ?>

<div class="tablaAñadirEscDep">
  <form action="../controllers/GestionEscuela_Controller.php?action=ADD" method="post" >
      <input type="text" name="nombre" placeholder="Nombre Escuela Deportiva" onblur="comprobarVacio(nombre)">
      <input type="date" name="horario" placeholder="Horario inicio" >
      <input type="email" name="entrenador" placeholder="Entrenador email">
      <input type="text" name="codigoPista" placeholder="Codigo Pista" maxlength="6">
      <input type="text" name="periodicidad" placeholder="Periodicidad" maxlength="1" >
      <input type="text" name="minInscritos" placeholder="Minimo Inscritos" maxlength="2" >
      <input type="text" name="maxInscritos" placeholder="Maximo Inscritos" maxlength="2" >
      <input type="hidden" name="estado" placeholder="Estado" value="abierto">
      <button class="botonAñadirCamp" type="submit" name="button" >Añadir</button>
  </form>
</div>

<?php
include '../views/Footer.php';
  }
}



 ?>
