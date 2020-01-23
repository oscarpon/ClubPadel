<?php
class PartidoCampEditView{
  function __construct($fila){
    $this->render($fila);
  }
  function render($fila){
    include '../views/Header.php';
?>

<div class="formularioEditar">
  <form id="editar" action='../controllers/Campeonato_Controller.php' method='post'>
    <h3 id="editarPartidoCamp">Editar partido de campeonato</h3>
    <a href="../controllers/Campeonato_Controller.php"><img src="../img/volver.png" width="22px" height="22px" class="botonVolverEditPartidoCamp" ></a>
    <div>
      <div>
        <label></label>
        <input id="codigoPista" name="codigoPista" type="hidden" value="<?php echo $fila['codigoPista'] ?>" aria-describedby="">
      </div>
      <div>
        <label></label>
        <input id="fecha" name="fecha" type="hidden" value="<?php echo $fila['fecha'] ?>" aria-describedby="" >
      </div>
      <div>
        <label></label>
        <input id="miembro1Par1" name="miembro1Par1" type="hidden" value="<?php echo $fila['miembro1Par1'] ?>" aria-describedby="" >
      </div>
      <div>
        <label></label>
        <input id="miembro2Par1" name="miembro2Par1" type="hidden" value="<?php echo $fila['miembro2Par1'] ?>" aria-describedby="">
      </div>
      <div>
        <label></label>
        <input id="miembro1Par2" name="miembro1Par2" type="hidden" value="<?php echo $fila['miembro1Par2'] ?>" aria-describedby="">
      </div>
      <div>
        <label></label>
        <input id="miembro2Par2" name="miembro2Par2" type="hidden" value="<?php echo $fila['miembro2Par2'] ?>" aria-describedby="">
      </div>
    <div>
      <label></label>
      <input id="nombreCamp" name="nombreCamp" type="hidden" value="<?php echo $fila['nombreCamp'] ?>" aria-describedby="">
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
