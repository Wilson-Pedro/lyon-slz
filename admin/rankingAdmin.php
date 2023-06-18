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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/navHamburguer.css">
  <link rel="stylesheet" href="../css/layout.css">
  <link rel="stylesheet" href="../css/timeANDescudo.css">
  <link rel="stylesheet" href="../css/update-delete.css">
  <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
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
              <a class="nav-link active" id="rankingAdm" aria-current="page" href="rankingAdmin.php">RANKING</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="noticiaisAdmin.php">NOTÍCIAS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MAIS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="cadastroDeJogador.php">CADASTRAR JOGADOR</a></li>
                <li><a class="dropdown-item" href="cadastroDePartidas.php">CADASTRAR PARTIDA</a></li>
                <li><a class="dropdown-item" href="cadastroDeCampeonato.php">CADASTRAR CAMPEONATO</a></li>
                <li><a class="dropdown-item" href="../home.php">SAIR</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>

  <main>
    <div class="container-fluid">
      <!-- ATUALIZAR -->
      <br><br>
      <form class="oculto" id="form_atualiza" method="post">
        <div id="div-update" class="oculto">
          <h5 class="inputTitulo">ID:</h5>
          <input type="text" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>
          <h5 class="inputTitulo">Gols:</h5>
          <input type="number" id="gols_editado" name="gols_editado" placeholder="Editar gols" required><br><br>
          <button type="submit" name="atualizar" id="btn-atualizar">Atualizar</button>
          <button type="button" id="cancelar" name="cancelar">Cancelar</button>
          <hr>
        </div>
      </form>
      <?php
      //PROCESSO DE ATUALIZAÇÃO
      if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['gols_editado'])) {
        $id = $_POST['id_editado'];
        $gols = $_POST['gols_editado'];
        $sql = $pdo->prepare("UPDATE tbljogadoress SET gols = :gols WHERE id= :id");
        $sql->bindValue(':gols', $gols);
        $sql->bindValue(':id', $id);
        $sql->execute();
        echo "
            <script>
            var rankingAdm = document.getElementById('rankingAdm');
            rankingAdm.click();
            </script>
            ";
        /*
          $sql = $pdo->prepare("UPDATE tbljogadores SET nome=?,idade=?, posicao=?, gols=? WHERE id=?");
          $sql->execute(array($nome, $idade, $posicao, $gols, $id));
          echo "Atualizado " . $sql->rowCount() . "registros!";*/
      }
      ?>
      <br><br><br>
      <?php
      if (count($dados) > 0) {
        echo "<table class='table table-striped'>
          <thead class=table-dark>
          <tr>
              <th>Ranking</th>
              <th>Nome</th>
              <th>Gols</th>
              <th>Atualizar</th>
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
                          <td><a href='#' class='btn-atualizar' data-id='" . $valor['id'] . "'data-gols='" . $valor['gols'] . "'>Atualizar</a></td>
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
        echo "<p style='text-align:center'>Nenhuma jogador foi <a href='cadastroDeJogador.php'>cadastrado</a></p>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p class="mb-0">EscolinhaDeJutebol LYON SLZ</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>
    //      ATUALIZAR

    $(".btn-atualizar").click(function() {
      var id = $(this).attr('data-id');
      var gols = $(this).attr('data-gols');

      $('#form_atualiza').removeClass('oculto');
      $('#div-update').removeClass('oculto');


      $("#id_editado").val(id);
      $("#gols_editado").val(gols);

    });

    //CANCELAR

    $('#cancelar').click(function() {
      $('#form_atualiza').addClass('oculto');
      $('#div-update').addClass('oculto');
    });
  </script>
</body>

</html>