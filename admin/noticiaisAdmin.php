<?php

include('../user/db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tblpartidass ORDER BY id LIMIT 0, 10000");
$sql->execute();
$dados = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/timeANDescudo.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/news.css">
  <link rel="stylesheet" href="../css/navegacao.css">
  <link rel="stylesheet" href="../css/navResponsivo.css">

  <title>Notícias</title>

</head>
<style>
  body {
    width: 100%;
  }

  #btn-fotos {
    color: white;
    font-weight: bold;
  }

  #btn-fotos:hover {
    background-color: rgb(230, 150, 3);
  }

  div#jogosToday {
    margin-left: 5vw;
  }

  div#placar {
    margin-top: 15vh;
  }

  div#placar>h1 {

    text-align: center;
  }

  #img-calendar {
    display: block;
    margin: auto;
  }

  #calendar>#btn-jogos {
    display: block;
    margin: auto;
  }
</style>

<body>
  <!-- CABEÇALHO -->
  <div class="cabecalho">
    <picture>
      <source media="(max-width: 261px)" srcset='../img/imgLogo/lyonSlzEscudo5.png'>
      <source media="(max-width: 269px)" srcset='../img/imgLogo/lyonSlzEscudo4.png'>
      <source media="(max-width: 311px)" srcset='../img/imgLogo/lyonSlzEscudo3.png'>
      <source media="(max-width: 375px)" srcset='../img/imgLogo/lyonSlzEscudo2.png'>
      <img src="../img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ">
    </picture>
    <header class="navbar ">
      <nav class="dp-menu mt-4">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="homeAdmin.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">JOGADORES</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="subsAdmin/sub09Admin.php">sub09</a>
                <a href="subsAdmin/sub11Admin.php">sub11</a>
                <a href="subsAdmin/sub13Admin.php">sub13</a>
                <a href="subsAdmin/sub15Admin.php">sub15</a>
                <a href="subsAdmin/sub17Admin.php">sub17</a>
              </li>
              <li>
                <a href="rankingAdmin.php">RANKING</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">PARTIDAS</a>
            <ul class="sub-menu">
              <li>
                <a href="calendarioAdmin.php">CALENDÁRIO DE JOGOS</a>
                <a href="historicoPartidasAdmin.php">HISTÓRICO DE PARTIDAS</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="noticiaisAdmin.php" id="marcado">NOTÍCIAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">MAIS</a>
            <ul class="sub-menu">
              <li>
                <a href="cadastroDeJogador.php">Cadastrar Jogador</a>
                <a href="cadastroDePartidas.php">Cadastrar partida</a>
                <a href="../user/home.php">Sair</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>

  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-8">
        <h1>
          <i class="fa-solid fa-2x fa-bullhorn"></i>
          <span class="logo">De olho nas notíciais!</span>
        </h1>
      </div>
      <div class="col-lg-2">

      </div>
    </div>

    <div class="row mt-4 mb-4">
      <div class="col-lg-8">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

          <!--BOTÕES DO CARROSSEL-->

          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

          <!-- IMAGENS DO CARROSSEL -->

          <div class="carousel-inner">

            <!-- CARROSSEL 1 -->

            <div class="carousel-item active">
              <img src="../img/imgTime/imgTime03.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Informações sobre os jogos</h5>
                <!--<p>Some representative placeholder content for the first slide.</p>-->
              </div>
            </div>

            <!-- CARROSSEL 2 -->

            <div class="carousel-item">
              <img src="../img/imgTime/imgTime05.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Jogaddores</h5>

              </div>
            </div>

            <!-- CARROSSEL 3 -->

            <div class="carousel-item">
              <img src="../img/imgTime/imgTime06.png" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Veja os Gols</h5>

              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- ACCORDION -->

      <div class="col-lg-4">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Sobre o Time
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Sobre o Técnico.
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto mt-4">
          <a href="fotosAdmin.php" class="btn btn-warning mt-2" id="btn-fotos" type="button">Ver Fotos</a>
        </div>

      </div>
    </div>

    <!-- CALENÁRIO -->
    <div class="barra"></div>

    <h1 style='text-align: center;' class='barra mt-4'>Jogos de Hoje:</h1>

    <div class="row">
      <div class="col-lg-4" id="calendar">
        <img src="../img/imagens/matchCalendar.PNG" id="img-calendar" class="img-thumbnail img-fluid" alt="imafem de um calendário">
        <a href="calendarioAdmin.php" id="btn-jogos" class="btn btn-warning mt-4">Confira os futuros jogos.</a>
      </div>

      <div class="col-lg-4">


      </div>

      <div class="col-lg-4">
        <div class="mt-4" id="jogosToday">
          <?php
          $cont = 0;
          echo "<hr>";
          $dataAtual = date("Y-m-d");
          if (count($dados) > 0) {
            foreach ($dados as $chaves => $valor) {
              if ($valor['data_partida'] == $dataAtual) {
                $cont += 1;
                if ($cont == 1) {
                  echo "<h1>Hoje tem Jogo!</h1>";
                }
                echo "<hr>";
                echo "<p class='fs-2 mt-3'> Lyon x " . $valor['timeb'] . "</p>";
                echo "<p class='fs-2 mt-3'>Horário: " . date("H:i", strtotime($valor['horario'])) . "</p>";
              }
            }
          }
          if ($cont == 0) {
            echo "<h2>Não haverá jogo hoje.</h2><br><br>";
            echo "<p>Para mais informações acesse o <a href='calendarioAdmin.php'>calendário</a>.</p>";
          }
          ?>
        </div>
      </div>

      <!-- PLACAR -->

      <div class="col-lg-4 mt-0">
        <div id="placar" class="mt-4">


        </div>
      </div>
    </div>

    <div class="barra mt-4"></div>

    <h1 style='text-align: center;' class='barra mt-4'>Placar da Partida.</h1>

    <div class="row">
      <div class="col-lg-4">
        <div class="placar">
          <?php
          $count = 0;
          $pla = 0;
          echo "<br><br><br>";
          echo "<h1 class='mt-4'>Resultado: </h1>";
          if (count($dados) > 0) {
            foreach ($dados as $chaves => $valor) {
              if ($valor['data_partida'] == $dataAtual) {
                $pla = 1;
                $count = 1;

                echo "<hr>";
                echo "<div class='placar'>
                  <p class='fs-2 mt-3'> Lyon " . $valor['gols_lyon'] . " x " . $valor['gols_adv'] . " " . $valor['timeb'] . " </p>
                </div>";
              }
            }
          }
          if ($pla == 1) {
            echo "<br>";
            echo "<p style='text-align:center' >Atualize o placar no <a href='historicoPartidasAdmin.php'>histórioco de partidas</a>.</p>";
          }
          if ($count == 0) {
            echo "<hr>";
            echo "<h2 style='text-align: center'>O placar não está disponível no momento.</h2><br>";
            echo "<p style='text-align:center' class='mt-4'>Para mais informações acesse o <a href='historicoPartidasAdmin.php'>histórioco de partidas</a>.</p>";
          }
          ?>

        </div>
      </div>

      <div class="col-lg-4">

      </div>

      <div class="col-lg-4">
        <div class="placar">
          <img src="../img/imagens/imagem10.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </div>


  <footer class="mt-4">
    <p class="mb-0">Desenvolvimento estacio</p>
  </footer>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>