<?php
include('include/verificacao.php');
include('../db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tblpartidass");
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/navHamburguer.css">
  <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/timeANDescudo.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/news.css">

  <title>Notícias</title>

</head>
<style>
  body {
    width: 100%;
    font-family: Arial, Helvetica, sans-serif;
  }

  a.nav-link {
    font-size: 100%;
  }

  div.fotoAlterada {
    width: 100%;
  }

  #botao-fotos {
    color: white;
    font-weight: bold;
  }

  #botao-fotos:hover {
    background-color: rgb(230, 150, 3);
  }

  #form-foto {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .hidden {
    display: none;
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

  div.barraAzul {
    width: 100%;
    height: 10%;
    background-color: rgb(8, 8, 20);
  }

  p.description {
    text-align: left;
  }
</style>

<body>
  <!-- CABEÇALHO -->
  <div class="cabecalho">
    <picture>
      <source media="(max-width: 261px)" srcset='../img/imgLogo/lyonSlzEscudo5.png' loading="lazy">

      <source media="(max-width: 269px)" srcset='../img/imgLogo/lyonSlzEscudo4.png' loading="lazy">

      <source media="(max-width: 311px)" srcset='../img/imgLogo/lyonSlzEscudo3.png' loading="lazy">

      <source media="(max-width: 375px)" srcset='../img/imgLogo/lyonSlzEscudo2.png' loading="lazy">

      <img src="../img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ" loading="lazy">
    </picture>
    <nav class="navbar navbar-expand-lg mt-4">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="homeAdmin.php">HOME</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                CATEGORIAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="subsAdmin/sub09Admin.php">sub09</a></li>
                <li><a class="dropdown-item" href="subsAdmin/sub11Admin.php">sub11</a></li>
                <li><a class="dropdown-item" href="subsAdmin/sub13Admin.php">sub13</a></li>
                <li><a class="dropdown-item" href="subsAdmin/sub15Admin.php">sub15</a></li>
                <li><a class="dropdown-item" href="subsAdmin/sub17Admin.php">sub17</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PARTIDAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="calendarioAdmin.php">CALENDÁRIO DE JOGOS</a></li>
                <li><a class="dropdown-item" href="jogoDeHojeAdmin.php">JOGOS DE HOJE</a></li>
                <li><a class="dropdown-item" href="campeonatosAdmin.php">CAMPEONATOS</a></li>
                <li><a class="dropdown-item" href="historicoPartidasAdmin.php">HISTÓRICO DE PARTIDAS</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="rankingAdmin.php">RANKING</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="noticiaisAdmin.php">NOTÍCIAS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MAIS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cadastroDeJogador.php">CADASTRAR JOGADOR</a></li>
                <li><a class="dropdown-item" href="cadastroDePartidas.php">CADASTRAR PARTIDA</a></li>
                <li><a class="dropdown-item" href="cadastroDeCampeonato.php">CADASTRAR CAMPEONATO</a></li>
                <li><a class="dropdown-item" href="cadastroDeNoticia.php"> CADASTRAR NOTÍCIA</a></li>
                <li><a class="dropdown-item" href="../home.php">SAIR</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="container">
    <div class="row mt-4">
      <div class="col-lg-8">
        <h1>
          <i class="fa-solid fa-2x fa-bullhorn"></i>
          <span class="logo">De olho nas notíciais! ⚽</span>
        </h1>
        <div class="barraAzul">

        </div>
      </div>
      <div class="col-lg-2">

      </div>
    </div>

    <div class="row mt-4 mb-4">
      <div class="col-lg-8">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">


          <!-- IMAGENS DO CARROSSEL -->

          <div class="carousel-inner">

            <!-- FOTO NOTÍCIA -->

            <div class="carousel-item active">
              <div class="fotoAlterada">

                <?php include('include/fotoNoticiaAdmin.php') ?>

              </div>
              <div class="carousel-caption d-none d-md-block">
                <!--<p>Some representative placeholder content for the first slide.</p>-->
              </div>

              <form id="form-foto" action="include/enviaNoticias.php" method="POST" enctype="multipart/form-data" class="mt-1">

                <button type="button" class="btn btn-warning" id="alterar" onclick="alterarFoto()">Alterar Foto</button>

                <button type="submit" class="btn btn-primary hidden" id="postar" onclick="postarFoto()">Postar</button>

                <input class="hidden" type="file" id="arquivo" name="arquivo" value="">

              </form>

            </div>

            <!-- CARROSSEL 2 -->

            <!-- <div class="carousel-item">
              <div class="fotoAlterada">

                

              </div>
              <div class="carousel-caption d-none d-md-block">
               
              </div>

              <form id="form-foto" action="include/enviaNoticias2.php" method="POST" enctype="multipart/form-data" class="mt-1">

                <button type="button" class="btn btn-warning" id="alterar2" onclick="alterarFoto2()">Alterar Foto</button>

                <button type="submit" class="btn btn-primary hidden" id="postar2" onclick="postarFoto2()">Postar</button>

                <input class="hidden" type="file" id="arquivo2" name="arquivo2" value="">

              </form>
            </div> -->

            <!-- CARROSSEL 3 -->

            <!-- <div class="carousel-item">
              <img src="../img/imgTime/imgTime06.png" loading="lazy" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">

              </div>
              <div class="btn-container mt-1">
                <form method="post">
                  <button type="button" class="btn btn-warning" onclick="alterar3()">Alterar Foto</button>
                  <input class="hidden" type="file" id="arquivo3" name="arquivo3" value="">
                </form>
              </div>
            </div> -->

          </div>

          <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button> -->
        </div>
      </div>

      <!-- ACCORDION -->

      <?php
      require('../db/conexao.php');
      include('include/accordionAdmin.php') ?>
    </div>

    <!-- CALENÁRIO -->
    <div class="barra"></div>

    <h1 style='text-align: center;' class='barra mt-4'>Jogos de Hoje:</h1>

    <div class="row">
      <div class="col-lg-4" id="calendar">
        <img src="../img/imagens/matchCalendar.PNG" loading="lazy" id="img-calendar" class="img-thumbnail img-fluid" alt="imafem de um calendário">
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
                echo "<p class='fs-2 mt-3'> Lyon x " . $valor['adversario'] . "</p>";
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
                  <p class='fs-2 mt-3'> Lyon " . $valor['gols_lyon'] . " x " . $valor['gols_adv'] . " " . $valor['adversario'] . " </p>
                </div>";
              }
            }
          }

          if ($pla == 1) {
            echo "<br>";
            echo "<p style='text-align:center' >Atualize o placar nos <a href='jogoDeHoje.php'>Jogos de hoje</a>.</p>";
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
          <img src="../img/imagens/imagem10.png" loading="lazy" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </div>


  <footer class="mt-4">
    <p class="mb-0">Desenvolvimento estacio</p>
  </footer>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>
    var alterar = document.getElementById("alterar");
    var arquivo = document.getElementById("arquivo");
    var postar = document.getElementById("postar");

    var alterar2 = document.getElementById("alterar2");
    var arquivo2 = document.getElementById("arquivo2");
    var postar2 = document.getElementById("postar2");


    function alterarFoto() {
      arquivo.click();
      alterar.style.display = "none";
      postar.style.display = "block";
    }

    function postarFoto() {
      alterar.style.display = "block";
      postar.style.display = "none";
    }


    function alterarFoto2() {
      arquivo.click();
      alterar2.style.display = "none";
      postar2.style.display = "block";
    }

    function postarFoto2() {
      alterar2.style.display = "block";
      postar2.style.display = "none";
    }
  </script>
</body>

</html>