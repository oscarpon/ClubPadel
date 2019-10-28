<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" media="screen" />
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cuprum|Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cuprum|Permanent+Marker|Rajdhani&display=swap" rel="stylesheet">
  <script src="../functions/Validaciones.js"></script>
    <title></title>
  </head>
<?php

include '../functions/Autenticacion.php';

if (!isAuthenticated()) {
  ?>
  <body>
    <div class="nav">
      <div class="wrapper"></div>
        <div class="tituloPadel">Club de padel</div>
        <nav>
          <a href="#">Inicio</a>
          <a href="#">Contacto</a>
        </nav>
    </div>
  <?php }else if($_SESSION['rol'] == 'D'){ ///Si es un usuario deportista ?>

  <body>
    <div class="nav">
      <div class="wrapper"></div>
        <div class="tituloPadel">Club de padel</div>
        <nav>
          <a href="#">Inicio</a>
          <a href="../controllers/Reserva_Controller.php">Mis reservas</a>
          <a href="../controllers/OfertaPartido_Controller.php">Mis partidos ofertados</a>
          <a href="../controllers/InscripcionPartido_Controller.php">Inscribirme a un partido</a>
          <a href="#">Contacto</a>
          <a id="desconectar" href="../functions/Desconectar.php"> <img src="../img/desconectar.png" width="24px" height="24px" > </a>
        </nav>
    </div>
<?php } else if ($_SESSION['rol'] == 'A'){ ?>
  <body>
    <div class="nav">
      <div class="wrapper"></div>
        <div class="tituloPadel">Club de padel</div>
        <nav>
          <a href="#">Inicio</a>
          <a href="../controllers/Usuario_Controller.php">Usuarios</a>
          <a href="../controllers/PromocionPartido_Controller.php">Promociones de partidos</a>
          <a href="../controllers/Noticia_Controller.php">Gestionar noticias</a>
          <a href="../controllers/Pago_Controller.php">Gestionar pagos</a>
          <a href="#">Contacto</a>
          <a id="desconectar" href="../functions/Desconectar.php"> <img src="../img/desconectar.png" width="24px" height="24px" > </a>
        </nav>
    </div>

<?php } else if ($_SESSION['rol'] == 'E'){?>
  <body>
    <div class="nav">
      <div class="wrapper"></div>
        <div class="tituloPadel">Club de padel</div>
        <nav>
          <a href="#">Inicio</a>
          <a href="#">Contacto</a>
          <a id="desconectar" href="../functions/Desconectar.php"> <img src="../img/desconectar.png" width="24px" height="24px" > </a>
        </nav>
    </div>

<?php }else{?>
  <body>
    <div class="nav">
      <div class="wrapper"></div>
        <div class="tituloPadel">Club de padel</div>
        <nav>
          <a href="#">Inicio</a>
        </nav>
    </div>
<?php } ?>
