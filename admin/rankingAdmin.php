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
  <link rel="stylesheet" href="../css/layout.css">
  <link rel="stylesheet" href="../css/timeANDescudo.css">
  <link rel="stylesheet" href="../css/update-delete.css">
  <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/navegacao.css">
  <link rel="stylesheet" href="../css/navResponsivo.css">
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
            <a class="nav-link" href="#" id="marcado">CATEGORIAS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="subsAdmin/sub09Admin.php">sub09</a>
                <a href="subsAdmin/sub11Admin.php">sub11</a>
                <a href="subsAdmin/sub13Admin.php">sub13</a>
                <a href="subsAdmin/sub15Admin.php">sub15</a>
                <a href="subsAdmin/sub17Admin.php">sub17</a>
              </li>
              <li>
                <a href="rankingAdmin.php" id="marcado">RANKING</a>
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
            <a class="nav-link" href="noticiaisAdmin.php">NOTÍCIAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">MAIS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="cadastroDeJogador.php">Cadastrar Jogador</a>
                <a href="cadastroDePartidas.php">Cadastrar partida</a>
                <a href="../home.php">Sair</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
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
              <th>Posição</th>
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
                          <td>" . $valor['nome'] . "</td>
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