<?php
class ReservaAddView{
  function __construct($query){
    $this->render($query);
  }
  function render($query){
    include '../views/Header.php';
?>

<div class="formularioReservar">
  <form id="añadir" action='../controllers/Reserva_Controller.php' method='post'>
    <label>Seleccione la fecha en la que desea reservar la pista</label>
        <select id="tablaFecha" name="fecha">
          <?php
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option>'.$valores[fecha].'</option>';
          }
        ?>
        </select>
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
