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
        <div class="tituloPadel">Club de padel</div>
        <nav class="navUsu">
        <ul class="submenuUsu">
          <li><a href="#">Inicio</a></li>
          <li><a href="../controllers/Reserva_Controller.php">Mis reservas</a></li>
          <li><a href="">Partidos</a>
            <ul>
              <li><a href="../controllers/InscripcionPartido_Controller.php">Inscribirme a un partido</a></li>
              <li><a href="../controllers/OfertaPartido_Controller.php">Partidos ofertados</a></li>
            </ul>
          </li>
          <li><a href="">Campeonatos</a>
            <ul>
              <li><a href="../controllers/InscripCamp_Controller.php">Inscribirme a un campeonato</a></li>
              <li><a href="../controllers/Pareja_Controller.php">Parejas</a></li>
            </ul>
          </li>
          <li><a id="desconectar" href="../functions/Desconectar.php"> <img src="../img/desconectar.png" width="24px" height="24px" > </a></li>
        </ul>
        </nav>
    </div>
<?php } else if ($_SESSION['rol'] == 'A'){ ?>
  <body>
    <div class="nav">
        <div class="tituloPadel">Club de padel</div>
        <nav class="navAdmin">
        <ul class="submenu">
          <li><a href="#">Inicio</a></li>
          <li><a href="../controllers/PromocionPartido_Controller.php">Promociones de partidos</a></li>
          <li><a href=""> Gestionar </a>
            <ul>
              <li><a href="../controllers/Usuario_Controller.php">Usuarios</a></li>
              <li><a href="../controllers/Campeonato_Controller.php">Campeonatos</a></li>
              <li><a href="../controllers/Liga_Controller.php">Ligas</a></li>
              <li><a href="../controllers/Noticias_Controller.php">Noticias</a></li>
              <li><a href="../controllers/Pago_Controller.php">Pagos</a></li>

            </ul>
          </li>
          <li><a href="#">Contacto</a></li>
          <li><a id="desconectar" href="../functions/Desconectar.php"> <img src="../img/desconectar.png" width="24px" height="24px" > </a></li>
        </ul>

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
