<?php
class OfertaPartidoAddView{
  function __construct($query){
    $this->render($query);
  }
  function render($query){
    include '../views/Header.php';
?>

<div class="formularioOfertarAdd">
  <form id="añadir" action='../controllers/OfertaPartido_Controller.php' method='post'>
        <label>Seleccione la fecha en la que desea que se juegue el partido</label>
        <select class="tablaFechaOfPart" name="fecha">
          <?php
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option>'.$valores[fecha].'</option>';
          }
        ?>
        </select>
      <button name="action" value="ADD" type="submit" class="botonOfertar">Ofertar</button>
    <a href="../controllers/OfertaPartido_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverOfPar" ></a>
  </div>



  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
