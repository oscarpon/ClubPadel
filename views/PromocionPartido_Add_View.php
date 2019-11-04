<?php
class PromocionPartidoAddView{
  function __construct($query){
    $this->render($query);
  }
  function render($query){
    include '../views/Header.php';
?>

<div class="formularioAñadirProm">
  <form id="añadir" action='../controllers/PromocionPartido_Controller.php' method='post'>
    <label id="letraPromocionAd">Seleccione la fecha en la que desea que se juegue el partido</label>
    <select class="tablaFecha" name="fecha">
      <?php
      while ($valores = mysqli_fetch_array($query)) {
        echo '<option>'.$valores[fecha].'</option>';
      }
    ?>
    </select>
    <a href="../controllers/PromocionPartido_Controller.php"><img src="../img/volver.png" width="24px" height="24px" class="botonVolverProm" ></a>
    <button name="action" value="ADD" type="submit" class="botonAñadirProm">Promocionar</button>

  </div>



  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
