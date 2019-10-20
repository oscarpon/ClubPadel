<?php
class OfertaPartidoAddView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioAñadir">
  <form id="añadir" action='../controllers/OfertaPartido_Controller.php' method='post'>
    <h3 id="nuevaOferta">Como deportista tienes el derecho de ofertar partidos a
      otros jugadores. Pulsando el boton de "Ofertar" publicara la oferta y otros
      judadores se podran apuntar. El partido solo se celebrara si hay 4 deportistas inscritos
      en la oferta.</h3>
    <a href="../controllers/OfertaPartido_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolver" ></a>
  </div>

  <button name="action" value="ADD" type="submit" class="botonAñadir">Ofertar</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
