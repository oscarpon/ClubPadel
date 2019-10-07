<footer id="main-footer" class="bg-dark">
  <div class="container">
    <div class="row">
      <div class="col text-center py-2">
        <h3>PadelNuestro</h3>
        <p>Copyright&copy; <span id="year"></span></p>
        <button class="btn btn-outline-light" data-toggle="modal" data-target="#contactModal">
          Contáctanos
        </button>
      </div>
    </div>
  </div>
</footer>

<!--Modal de contacto-->
<div class="modal fade bg-dark text-dark" id="contactModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Contáctanos</h3>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Mensaje</label>
            <textarea  id="modalTextarea" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-outline-dark btn-block">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

  // Get del año actual
  $('#year').text(new Date().getFullYear());

</script>

</body>
</html>
