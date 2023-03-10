<?php
require('../db/conexao.php');

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/layout.css">
  <link rel="stylesheet" href="../../css/timeANDescudo.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="../../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../../css/update-e-delete.css">
  <link rel="stylesheet" href="../../css/navegacao.css">
  <link rel="stylesheet" href="../../css/navResponsivo.css">

  <title>Sub17</title>
  <style>
    h1.categoria {
      text-align: center;
      font-weight: bold;
      padding-top: 6vh;
      padding-bottom: 4vh;
    }

    .dp-menu ul li a {
      font-weight: bold;
    }

    body {
      max-width: 100%;
      background-color: rgb(214, 168, 100);
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
  </style>
</head>

<body>
  <!-- CABEÇALHO -->
  <div class="cabecalho">
    <picture>
      <source media="(max-width: 261px)" srcset='../../img/imgLogo/lyonSlzEscudo5.png'>
      <source media="(max-width: 269px)" srcset='../../img/imgLogo/lyonSlzEscudo4.png'>
      <source media="(max-width: 311px)" srcset='../../img/imgLogo/lyonSlzEscudo3.png'>
      <source media="(max-width: 375px)" srcset='../../img/imgLogo/lyonSlzEscudo2.png'>
      <img src="../../img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ">
    </picture>
    <header class="navbar ">
      <nav class="dp-menu mt-4">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="../home.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="marcado">JOGADORES</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="sub09.php">sub09</a>
                <a href="sub11.php">sub11</a>
                <a href="sub13.php">sub13</a>
                <a href="sub15.php">sub15</a>
                <a href="sub17.php" id="marcado">sub17</a>
              </li>
              <li>
                <a href="../ranking.php">RANKING</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">PARTIDAS</a>
            <ul class="sub-menu">
              <li>
                <a href="../calendario.php">CALENDÁRIO DE JOGOS</a>
                <a href="../historicoPartidas.php">HISTÓRICO DE PARTIDAS</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../noticiais.php">NOTÍCIAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">MAIS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="../login.php">Logar</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>

  <main>
    <h1 class="categoria">Categoria Sub-17</h1>
    <hr>
    <br>
    <?php
    $sub17 = 0;
    if (count($dados) > 0) {
      foreach ($dados as $chaves => $valor) {
        if ($valor['idade'] > 15 && $valor['idade'] <= 17) {
          $sub17++;
        }
      }
      if ($sub17 == 0) {
        echo "<br><p class='mt-4' style='text-align:center'>Nenhuma jogador desta foi cadastrado</p>";
      } else {
        echo "<table class='table table-striped'>
        <thead class=table-dark>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Posição</th>
            <th>Gols</th>
        </tr>
        </thead>";

        foreach ($dados as $chaves => $valor) {
          if ($valor['idade'] > 15 && $valor['idade'] <= 17) {
            echo "<tr>
                        <td>" . $valor['nome'] . "</td>
                        <td>" . $valor['idade'] . "</td>
                        <td>" . $valor['posicao'] . "</td>
                        <td>" . $valor['gols'] . "</td>
                    </tr>";
          }
        }
      }

      echo "</table>";
    } else {
      echo "<br><p class='mt-4' style='text-align:center'>Nenhuma jogador desta foi cadastrado</p>";
    }

    ?>
  </main>
  <footer>
    <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
  </footer>
</body>

</html>