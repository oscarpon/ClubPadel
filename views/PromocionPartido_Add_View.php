<?php
class PromocionPartidoAddView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioAñadir">
  <form id="añadir" action='../controllers/PromocionPartido_Controller.php' method='post'>
    <h3 id="nuevaPromocion">Como administrador puedes promocionar partidos para
    que la gente asista al club y disfutar de las instalaciones.</h3>
    <a href="../controllers/PromocionPartido_Controller"><img src="../img/volver.png" width="24px" height="24px" class="botonVolver" ></a>
  </div>

  <button name="action" value="ADD" type="submit" class="botonAñadir">Promocionar</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
