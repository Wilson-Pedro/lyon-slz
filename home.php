<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="css/navHamburguer.css">
  <link rel="stylesheet" href="css/timeANDescudo.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">

  <title>Escolinha de futebol</title>
  <style>
    body {
      width: 100%;
      min-height: 100%;
    }

    div.cabecalho {
      width: 100%;
    }

    div#icons {
      display: inline-block;
    }

    .card-title {
      text-align: center;
    }

    .card-text {
      text-align: center;
    }

    img.d-block {
      z-index: 0;
    }
  </style>
</head>

<body>
  <!-- CABEÇALHO -->
  <div class="cabecalho">
    <picture>
      <source media="(max-width: 261px)" srcset='img/imgLogo/lyonSlzEscudo5.png'>
      <source media="(max-width: 269px)" srcset='img/imgLogo/lyonSlzEscudo4.png'>
      <source media="(max-width: 311px)" srcset='img/imgLogo/lyonSlzEscudo3.png'>
      <source media="(max-width: 375px)" srcset='img/imgLogo/lyonSlzEscudo2.png'>
      <img src="img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ">
    </picture>
    <nav class="navbar navbar-expand-lg mt-4">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">HOME</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                CATEGORIAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="subs/sub09.php">sub09</a></li>
                <li><a class="dropdown-item" href="subs/sub11.php">sub11</a></li>
                <li><a class="dropdown-item" href="subs/sub13.php">sub13</a></li>
                <li><a class="dropdown-item" href="subs/sub15.php">sub15</a></li>
                <li><a class="dropdown-item" href="subs/sub17.php">sub17</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PARTIDAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="calendario.php">CALENDÁRIO DE JOGOS</a></li>
                <li><a class="dropdown-item" href="historicoPartidas.php">HISTÓRICO DE PARTIDAS</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="ranking.php">RANKING</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="noticiais.php">NOTÍCIAS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MAIS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="login.php">LOGAR</a></li>

              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!--CARROSSEL-->

  <section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>

      <!--IMAGENS DO CARROSSEL-->

      <div class="carousel-inner">
        <div class="carousel-item active">
          <!--IMAGEM 1-->
          <img class="d-block w-100" src="img/imgTime/imgTime01.png" alt="calendario">
        </div>
        <div class="carousel-item">
          <!--IMAGEM 2-->
          <img class="d-block w-100" src="img/imgTime/imgTime02.png" alt="galeria de fotos">
        </div>
        <!--IMAGEM 3-->
        <div class="carousel-item">
          <img class="d-block w-100" src="img/imgTime/imgTime04.png" alt="historico de partidas">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
      </a>
    </div>
  </section>

  <!--CARDS-->

  <section>
    <div class="container mb-5">
      <div class="row mt-4">
        <div class="col--sm-12 text-dark text-center my-3">
          <h1 class="mais">Mais</h1>

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="card border-success mt-4">
            <img class="card-img-top" src="img/imagens/imagem8.png">

            <!-- CARD 1 -->
            <div class="card-body">
              <h5 class="card-title mt-1">CALENDARIO DE PARTIDAS</h5>
              <p class="card-text">Confira os futuros jogos do seu time!</p>
              <a href="calendario.php" class="btn btn-outline-success mt-4">Visitar</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card border-success mt-4">
            <img class="card-img-top" src="img/imagens/instagram-g0673b2c70_640.png">

            <!-- CARD 2 -->
            <div class="card-body">
              <h5 class="card-title">NOSSAS REDES SOCIAIS</h5>
              <p class="card-text">Fique por dentro nos bastidores do nosso time acompanhando nossas redes sociais.
              </p>
              <a href="https://www.instagram.com/lyon.slz/?igshid=N2ZiY2E3YmU%3D" target="_blank" class="btn btn-outline-success">Visitar</a>
            </div>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-sm-4">
          <div class="card border-success mt-4">
            <img class="card-img-top" src="img/imagens/imagem4.jpg">
            <div class="card-body">
              <h5 class="card-title">ULTIMAS NOTICIAS</h5>
              <p class="card-text">Local destinado a informacoes extras sobre partidas e acontecimentos</p>
              <a href="noticiais.php" class="btn btn-outline-success">Visitar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>