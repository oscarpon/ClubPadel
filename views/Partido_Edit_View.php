<?php
class PartidoEditView{
  function __construct($fila){
    $this->render($fila);
  }
  function render($fila){
    include '../views/Header.php';
?>

<div class="formularioEditar">
  <form id="editar" action='../controllers/Partido_Controller.php' method='post'>
    <h3 id="editarPartido">Editar partido</h3>
    <a href="../controllers/Partido_Controller.php"><img src="../img/volver.png" width="20px" height="20px" class="botonVolverEditPartido" ></a>
    <div>
      <div>
        <label></label>
        <input id="codigoPista" name="codigoPista" type="hidden" aria-describedby="" value="<?php echo $fila['codigoPista'] ?>">
      </div>
      <div>
        <label></label>
        <input id="fecha" name="fecha" type="hidden" aria-describedby="" value="<?php echo $fila['fecha'] ?>">
      </div>
      <div>
        <label></label>
        <input id="miembro1Par1" name="miembro1Par1" type="hidden" aria-describedby="" value="<?php echo $fila['miembro1Par1'] ?>">
      </div>
      <div>
        <label></label>
        <input id="miembro2Par1" name="miembro2Par1" type="hidden" aria-describedby="" value="<?php echo $fila['miembro2Par1'] ?>">
      </div>
      <div>
        <label></label>
        <input id="miembro1Par2" name="miembro1Par2" type="hidden" aria-describedby="" value="<?php echo $fila['miembro1Par2'] ?>">
      </div>
      <div>
        <label></label>
        <input id="miembro2Par2" name="miembro2Par2" type="hidden" aria-describedby="" value="<?php echo $fila['miembro2Par2'] ?>">
      </div>

    <div id="resultado">
      <label>Resultado</label>
      <select id="tablaResultado" name="resultado" value="<?php echo $fila['resultado'] ?>">
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
