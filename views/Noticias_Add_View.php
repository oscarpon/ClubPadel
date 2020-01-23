<?php
  /**
   *
   */
  class NoticiasAddView
  {

    function __construct()
    {
      $this->render();
    }

    function render(){

      include '../views/Header.php';
?>

<form class="formularioNotAdd" method="post" action="../controllers/Noticias_Controller.php?action=ADD">
  <div>
    <input type="hidden" value="0" name="idContenido" class="form-control form-control-lg" placeholder="Titulo"/>
  </div>
        <div>
          <input type="text" name="titulo" class="form-control form-control-lg" placeholder="Subtitulo" required/>
        </div>
        <div class="form-group my-3">
          <textarea rows="4" cols="50" name="descripcion" class="form-control form-control-lg" placeholder="Contenido de la noticia" required/></textarea>
        </div>
        <input type="submit" class="btn btn-dark my-5" value="Publicar"/>
</form>

<?php
  include '../views/Footer.php';
    }
  }

 ?>
