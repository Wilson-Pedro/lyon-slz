<?php
include('admin/includes/logout.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/timeANDescudo.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/imgFile.css">
  <title>Fotos</title>
</head>
<style>
  #body {
    max-width: 100%;
    background-color: rgb(214, 168, 100);
  }

  h1 {
    text-align: center;
  }

  .logo {
    font-weight: bold;
  }

  main {
    margin: auto;
    background-color: rgb(255, 255, 255);
    min-height: 100vh;
    display: block;
    margin: auto;
    width: 92vw;
    box-shadow: 0px 2px 5px 0px black;
  }

  button {
    color: white;
  }

  .hidden {
    display: none;
  }

  footer {
    background-color: #343a40;
    padding: 10px;
  }

  footer>p {
    text-align: center;
    color: white;
    font-weight: bold;
  }

  div#fotos>img {
    display: block;
    margin: auto;
  }

  div#botoes {
    text-align: center;
  }

  a.nav-link:hover {
    color: black;
  }

  #iconeVoltar {
    color: white;
    font-size: 250%;
    margin-left: 2%;
    cursor: pointer;
  }

  #iconeVoltar:hover {
    cursor: pointer;
    color: black;
  }
</style>

<body id="body">
  <!-- CABEÇALHO -->
  <div class="cabecalho">
    <picture>
      <source media="(max-width: 261px)" srcset='img/imgLogo/lyonSlzEscudo5.png' loading="lazy">

      <source media="(max-width: 269px)" srcset='img/imgLogo/lyonSlzEscudo4.png' loading="lazy">

      <source media="(max-width: 311px)" srcset='img/imgLogo/lyonSlzEscudo3.png' loading="lazy">

      <source media="(max-width: 375px)" srcset='img/imgLogo/lyonSlzEscudo2.png' loading="lazy">

      <img src="img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ" loading="lazy">
    </picture>

    <br>
    <a href="noticiais.php"><i class="bi bi-arrow-left-circle-fill" id="iconeVoltar"></i></a>
    <br>
  </div>

  <main>
    <br>
    <h1>
      <span class="logo">FOTOS DO TIME</span>
      <i class="bi bi-camera-fill bi-2x"></i>
    </h1>
    <div class="container-fluid mt-3">
      <div id="fotos">
        <?php include('admin/includes/lista.php'); ?>
      </div>
  </main>
  </div>
  <footer>
    <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
  </footer>
</body>

</html>