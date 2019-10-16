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
          <a href="#">Contacto</a>
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
          <a href="#">Contacto</a>
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
