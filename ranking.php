<?php
include('admin/include/logout.php');
?>

<?php
require('db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tbljogadoress");
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
  <link rel="stylesheet" href="css/navHamburguer.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/timeANDescudo.css">
  <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
  <title>Ranking</title>
  <style>
    body {
      font-family: 'Arial';
    }

    h1.ranking {
      text-align: center;
      font-weight: bold;
      padding-top: 6vh;
      padding-bottom: 4vh;
    }

    .dp-menu ul li a {
      font-weight: bold;
    }

    table {
      width: 100%;
    }

    th,
    td {
      padding: 10px;
      text-align: center;
      border: solid 1px black;
    }

    th.custom-th {
      width: 5%;
    }

    th {
      width: 20%;
    }

    .oculto {
      display: none;
    }

    main {
      width: 98vw;
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
              <a class="nav-link" aria-current="page" href="home.php">HOME</a>
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
              <a class="nav-link active" aria-current="page" href="ranking.php">RANKING</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="noticiais.php">NOTÍCIAS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ÁREA RESTRITA
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

  <main>
    <div class="container-fluid">
      <h1 class="ranking">Ranking de Gols</h1>
      <?php
      if (count($dados) > 0) {
        echo "<table class='table table-striped'>
          <thead class=table-dark>
          <tr>
              <th class='custom-th'>Posição</th>
              <th>Nome</th>
              <th class='custom-th'>Gols</th>
          </tr>
          </thead>";
        $maior = 0;
        foreach ($dados as $chaves => $valor) {
          if ($valor['gols'] > $maior) {
            $maior = $valor['gols'];
          }
        }
        $aux = 0;
        $contMaior = 0;
        $cont = 0;
        $ranking = 1;
        while ($cont < 11) {
          foreach ($dados as $chaves => $valor) {
            if ($valor['gols'] == $maior) {
              if ($ranking == 11) {
                break;
              }
              echo "<tr>
                          <td>" . $ranking . "</td>
                          <td>" . $valor['nome'] . " " . $valor['sobrenome'] . "</td>
                          <td>" . $valor['gols'] . "</td>
                      </tr>";
              $ranking += 1;
            }
          }
          $maior -= 1;
          $cont += 1;
          if ($cont == 10) {
            break;
          }
        }
        echo "</table>";
      } else {
        echo "<br><br><p class='mt-4' style='text-align:center' >Nenhum Jogador cadastrado</p>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>