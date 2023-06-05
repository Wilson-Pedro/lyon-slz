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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/timeANDescudo.css">
  <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/navResponsivo.css">
  <link rel="stylesheet" href="css/navegacao.css">
  <title>Ranking</title>
  <style>
    body {
      font-family: 'Arial';
    }

    .dp-menu ul li a {
      font-weight: bold;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 10px;
      text-align: center;
      border: solid 1px black;
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
      <source media="(max-width: 261px)" srcset='img/imgLogo/lyonSlzEscudo5.png'>
      <source media="(max-width: 269px)" srcset='img/imgLogo/lyonSlzEscudo4.png'>
      <source media="(max-width: 311px)" srcset='img/imgLogo/lyonSlzEscudo3.png'>
      <source media="(max-width: 375px)" srcset='img/imgLogo/lyonSlzEscudo2.png'>
      <img src="img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ">
    </picture>
    <header class="navbar ">
      <nav class="dp-menu mt-4">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="home.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="marcado">CATEGORIAS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="subs/sub09.php">sub09</a>
                <a href="subs/sub11.php">sub11</a>
                <a href="subs/sub13.php">sub13</a>
                <a href="subs/sub15.php">sub15</a>
                <a href="subs/sub17.php">sub17</a>
              </li>
              <li>
                <a href="ranking.php" id="marcado">RANKING</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">PARTIDAS</a>
            <ul class="sub-menu">
              <li>
                <a href="calendario.php">CALENDÁRIO DE JOGOS</a>
                <a href="historicoPartidas.php">HISTÓRICO DE PARTIDAS</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="noticiais.php">NOTÍCIAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">MAIS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="login.php">Logar</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>

  <main>
    <div class="container-fluid">
      <br><br><br>
      <?php
      if (count($dados) > 0) {
        echo "<table class='table table-striped'>
          <thead class=table-dark>
          <tr>
              <th>Posição</th>
              <th>Nome</th>
              <th>Gols</th>
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
                          <td>" . $valor['nome'] . "</td>
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
</body>

</html>