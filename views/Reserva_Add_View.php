<?php
class ReservaAddView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioReservar">
  <form id="añadir" action='../controllers/Reserva_Controller.php' method='post'>
    <h3 id="nuevaReserva">Como deportista puedes realizar reservas de pistas pagando
                          una cuota optando al uso de la pista durante 90 minutos.
                          La cuota es de 25,99 euros.</h3>
    <a href="../controllers/Reserva_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolver" ></a>
  </div>

  <button name="action" value="ADD" type="submit" class="botonReservar">Reservar</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
