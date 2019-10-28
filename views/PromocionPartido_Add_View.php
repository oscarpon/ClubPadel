<?php
class PromocionPartidoAddView{
  function __construct($query){
    $this->render($query);
  }
  function render($query){
    include '../views/Header.php';
?>

<div class="formularioAñadir">
  <form id="añadir" action='../controllers/PromocionPartido_Controller.php' method='post'>
    <label>Seleccione la fecha en la que desea que se juegue el partido</label>
    <select id="tablaFecha" name="fecha">
      <?php
      while ($valores = mysqli_fetch_array($query)) {
        echo '<option>'.$valores[fecha].'</option>';
      }
    ?>
    </select>
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
