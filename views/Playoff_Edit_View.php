<?php
class PlayoffEditView{
  function __construct(){
    $this->render();
  }
  function render(){
    include '../views/Header.php';
?>

<div class="formularioEditar">
  <form id="editar" action='../controllers/Playoff_Controller.php' method='post'>
    <h3 id="editarPlayoff">Editar playoff</h3>
    <a href="../controllers/Playoff_Controller.php"><img src="../img/volver.png" width="20px" height="20px" class="botonVolverEditPlayoff" ></a>
    <div>
      <div>
        <label></label>
        <input id="idPlayoff" name="idPlayoff" type="hidden" aria-describedby="">
      </div>
      <div>
        <label></label>
        <input id="miembro1Par1" name="miembro1Par1" type="hidden" aria-describedby="" >
      </div>
      <div>
        <label></label>
        <input id="miembro2Par1" name="miembro2Par1" type="hidden" aria-describedby="">
      </div>
      <div>
        <label></label>
        <input id="miembro1Par2" name="miembro1Par2" type="hidden" aria-describedby="">
      </div>
      <div>
        <label></label>
        <input id="miembro2Par2" name="miembro2Par2" type="hidden" aria-describedby="">
      </div>
    <div>
      <label></label>
      <input id="nombreCamp" name="nombreCamp" type="hidden" aria-describedby="">
    </div>

    <div id="resultado">
      <label>Resultado</label>
      <select id="tablaResultado" name="resultado">
        <option></option>
        <option value='P1'>Pareja 1</option>
        <option value='P2'>Pareja 2</option>
        <option value='NJ'>No jugado</option>
      </select>
    </div>
  </div>

  <button name="action" value="EDIT" type="submit" class="botonEdit">Editar</button>

  </form>

</div>


<?php
include '../views/Footer.php';
  }
}
 ?>
