<?php
class ParejaAddView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioAñadirPareja">
  <form id="añadir" action='../controllers/Pareja_Controller.php' method='post'>
    <h3 id="nuevaPareja">Añadir pareja</h3>
    <a href="../controllers/Pareja_Controller.php"><img src="../img/volver.png" width="20px" height="20px" class="botonVolverPareja" ></a>
    <div>
      <div>
        <label></label>
        <input id="miembro1" name="miembro1" type="text" aria-describedby="" value="<?php echo $_SESSION['email']?>" readonly placeholder="&#x1F464;  Miembro 1">
      </div>
    <div>
      <label></label>
      <input id="miembro2" name="miembro2" type="text" aria-describedby="" placeholder="&#x1F464;  Compañero">
    </div>
  </div>
  <div id="nivel">
    <label>Nivel</label>
    <select id="tablaNivel" name="nivel">
      <option></option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>

  <button onclick="validarAñadir" name="action" value="ADD" type="submit" class="botonAñadir">Añadir</button>

  </form>

</div>




<?php
include '../views/Footer.php';
  }
}
 ?>
