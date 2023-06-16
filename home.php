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
      <source media="(max-width: 261px)" srcset='img/imgLogo/lyonSlzEscudo5.png' loading="lazy">

      <source media="(max-width: 269px)" srcset='img/imgLogo/lyonSlzEscudo4.png' loading="lazy">

      <source media="(max-width: 311px)" srcset='img/imgLogo/lyonSlzEscudo3.png' loading="lazy">

      <source media="(max-width: 375px)" srcset='img/imgLogo/lyonSlzEscudo2.png' loading="lazy">

      <img src="img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ" loading="lazy">
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
                <li><a class="dropdown-item" href="jogoDeHoje.php">JOGOS DE HOJE</a></li>
                <li><a class="dropdown-item" href="campeonatosUser.php">CAMPEONATOS</a></li>
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

  <div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/imgTime/imgTime01.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/imgTime/imgTime05.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/imgTime/imgTime06.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="text-dark" title="Slide Anterior">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="text-dark" title="Proximo Slide">Proximo</span>
  </button>
</div>

  <!--CARDS-->

  <section>
    <div class="container mb-5">
      <div class="row mt-4">
        <div class="col--sm-12 textDaJ text-center my-3">
          <h1 class="mais">Mais</h1>

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="card border-success mt-4">
            <img class="card-img-top" src="img/imagens/imagem8.png" loading="lazy">

            <!-- CARD 1 -->
            <div class="card-body">
              <h5 class="card-title">CALENDARIO DE PARTIDAS</h5>
              <p class="card-text">Confira os futuros jogos do seu time!</p>
              <a href="calendarioAdmin.php" class="btn btn-outline-success mt-2">Visitar</a>
            </div>
          </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-sm-4">
          <div class="card border-success mt-4">
            <img class="card-img-top" src="img/imagens/instagram-g0673b2c70_640.png" loading="lazy">
            <div class="card-body">
              <h5 class="card-title">NOSSAS REDES SOCIAIS</h5>
              <p class="card-text">Fique por dentro dos bastidores do time.
              </p>
              <a href="https://www.instagram.com/lyon.slz/?igshid=N2ZiY2E3YmU%3D" class="btn btn-outline-success" target="_blank">Visitar</a>
            </div>
          </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-sm-4">
          <div class="card border-success mt-4">
            <img class="card-img-top" src="img/imagens/imagem4.jpg" loading="lazy">
            <div class="card-body">
              <h5 class="card-title">ULTIMAS NOTICIAS</h5>
              <p class="card-text">Confira as últimas notícias</p>
              <a href="noticiaisAdmin.php" class="btn btn-outline-success mt-1">Visitar</a>
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