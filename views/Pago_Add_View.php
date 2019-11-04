<?php
class PagoAddView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioAñadir">
  <form id="añadir" action='../controllers/Pago_Controller.php' method='post'>
    <h3 id="nuevoPago">Añadir pago</h3>
    <a href="../controllers/Pago_Controller"><img src="../img/volver.png" width="24px" height="24px" class="botonVolver" ></a>
    <div>
      <div>
        <label></label>
        <input id="email" name="email" type="text" aria-describedby="" placeholder="&#x1F464;  Email">
      </div>
    <div>
      <label></label>
      <input id="importe" name="importe" type="importe" aria-describedby="" placeholder="&#128273;  Importe">
    </div>
    <div id="pagado">
      <label>Pagado</label>
      <select id="tablaPagado" name="pagado">
        <option></option>
        <option>S</option>
        <option>N</option>
      </select>
    </div>
  </div>

  <button onclick="validarAñadir" name="action" value="ADD" type="submit" class="botonAñadir">Añadir</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>