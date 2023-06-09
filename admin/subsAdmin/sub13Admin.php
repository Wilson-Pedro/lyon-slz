<?php
require('../../db/conexao.php');

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
  <link rel="stylesheet" href="../../css/navegacao.css">
  <link rel="stylesheet" href="../../css/navResponsivo.css">
  <link rel="stylesheet" href="../../css/update-delete.css">
  <title>Sub13</title>
  <style>
    .dp-menu ul li a {
      font-weight: bold;
    }

    body {
      max-width: 100%;
      background-color: rgb(214, 168, 100);
    }

    table {
      width: 100%;
    }

    th,
    td {
      padding: 5px;
      text-align: center;
      border: solid 1px black;
      font-size: 13px;
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
            <a class="nav-link" href="../homeAdmin.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="marcado">CATEGORIAS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="sub09Admin.php">sub09</a>
                <a href="sub11Admin.php">sub13</a>
                <a href="sub13Admin.php" id="marcado">sub13</a>
                <a href="sub15Admin.php">sub15</a>
                <a href="sub17Admin.php">sub17</a>
              </li>
              <li>
                <a href="../rankingAdmin.php">RANKING</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">PARTIDAS</a>
            <ul class="sub-menu">
              <li>
                <a href="../calendarioAdmin.php">CALENDÁRIO DE JOGOS</a>
                <a href="../historicoPartidasAdmin.php">HISTÓRICO DE PARTIDAS</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../noticiaisAdmin.php">NOTÍCIAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">MAIS</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="../cadastroDeJogador.php">Cadastrar Jogador</a>
                <a href="../cadastroDePartidas.php">Cadastrar partida</a>
                <a href="../../home.php">Sair</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>



  <main>
    <div class="container-fluid">
      <h1 class="categoria">Categoria Sub-13</h1>
      <hr>
      <!-- ATUALIZAR -->
      <form class="oculto" id="form_atualiza" method="post">
        <div id="div-update" class="oculto">
          <h5 class="inputTitulo">ID:</h5>
          <input type="text" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>
          <h5 class="inputTitulo">Nome:</h5>
          <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" required> <br><br>
          <h5 class="inputTitulo">Idade:</h5>
          <input type="number" id="idade_editado" name="idade_editado" placeholder="Editar idade" required><br><br>
          <h5 class="inputTitulo">Posição:</h5>
          <input type="text" id="posicao_editado" name="posicao_editado" placeholder="Editar posicao" required><br><br>
          <h5 class="inputTitulo">Gols:</h5>
          <input type="number" id="gols_editado" name="gols_editado" placeholder="Editar gols" required><br><br>
          <button type="submit" name="atualizar" id="btn-atualizar">Atualizar</button>
          <button type="button" id="cancelar" name="cancelar">Cancelar</button>
          <hr>
        </div>
      </form>
      <!-- DELETAR -->
      <form class="oculto" id="form_deleta" method="post">
        <div id="div-delete" class="oculto">
          <input type="hidden " id="id_deleta" name="id_deleta" placeholder="ID" required> <br><br>
          <input type="hidden" id="nome_deleta" name="nome_deleta" placeholder="Editar nome" required> <br><br>
          <input type="hidden" id="idade_deleta" name="idade_deleta" placeholder="Editar idade" required><br><br>
          <input type="hidden" id="posicao_deleta" name="posicao_deleta" placeholder="Editar posicao" required><br><br>
          <input type="hidden" id="gols_deleta" name="gols_deleta" placeholder="Editar gols" required>
          <b>Tem certeza que quer deletar Jogador <span id="cliente"></span></b>
          <button type="submit" id="btn-deletar" name="deletar">Confirmar</button>
          <button type="button" id="cancelar_delete" name="cancelar_delete">Cancelar</button>
          <hr>
        </div>
      </form>
      <br><br>
      <?php
      //PROCESSO DE ATUALIZAÇÃO
      if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['nome_editado']) && isset($_POST['idade_editado']) && isset($_POST['posicao_editado']) && isset($_POST['gols_editado'])) {
        $id = $_POST['id_editado'];
        $nome = $_POST['nome_editado'];
        $idade = $_POST['idade_editado'];
        $posicao = $_POST['posicao_editado'];
        $gols = $_POST['gols_editado'];
        $sql = $pdo->prepare("UPDATE tbljogadoress SET nome = :nome ,idade = :idade, posicao = :posicao, gols = :gols WHERE id= :id");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':idade', $idade);
        $sql->bindValue(':posicao', $posicao);
        $sql->bindValue(':gols', $gols);
        $sql->bindValue(':id', $id);
        $sql->execute();
        /*
          $sql = $pdo->prepare("UPDATE tbljogadores SET nome=?,idade=?, posicao=?, gols=? WHERE id=?");
          $sql->execute(array($nome, $idade, $posicao, $gols, $id));
          echo "Atualizado " . $sql->rowCount() . "registros!";*/
      }
      ?>
      <?php
      //DELETAR DADOS
      if (isset($_POST['deletar']) && isset($_POST['id_deleta']) && isset($_POST['nome_deleta']) && isset($_POST['idade_deleta']) && isset($_POST['posicao_deleta']) && isset($_POST['gols_deleta'])) {
        $id = $_POST['id_deleta'];
        $nome = $_POST['nome_deleta'];
        $idade = $_POST['idade_deleta'];
        $posicao = $_POST['posicao_deleta'];
        $gols = $_POST['gols_deleta'];
        //COMANDO PARA DELETAR
        $sql = $pdo->prepare("DELETE FROM tbljogadoress WHERE id=? AND nome=? AND idade=? AND posicao=? AND gols=?");
        $sql->execute(array($id, $nome, $idade, $posicao, $gols));
      }
      ?>
      <?php
      $sub13 = 0;
      if (count($dados) > 0) {
        foreach ($dados as $chaves => $valor) {
          if ($valor['idade'] > 11 && $valor['idade'] <= 13) {
            $sub13++;
          }
        } if($sub13 == 0){
          echo "<p style='text-align:center'>Nenhuma jogador desta foi <a href='../cadastroDeJogador.php'>cadastrado</a></p>";
        } else  {
          echo "<div class='table table-responsive table-striped'>";
          echo "<table class='table table-striped'>
          <thead class=table-dark>
          <tr>
              <th>Nome</th>
              <th>Idade</th>
              <th>Posição</th>
              <th>Gols</th>
              <th>Editar</th>
          </tr>
          </thead>";
        foreach ($dados as $chaves => $valor) {
          if ($valor['idade'] > 11 && $valor['idade'] <= 13) {
            echo "<tr>
                          <td>" . $valor['nome'] . "</td>
                          <td>" . $valor['idade'] . "</td>
                          <td>" . $valor['posicao'] . "</td>
                          <td>" . $valor['gols'] . "</td>
                          <td><a href='#' class='btn-atualizar' data-id='" . $valor['id'] . "' data-nome='" . $valor['nome'] . "' data-idade='" . $valor['idade'] . "'data-posicao='" . $valor['posicao'] . "'data-gols='" . $valor['gols'] . "'>Atualizar</a> | <a href='#' class='btn-deletar' data-id='" . $valor['id'] . "' data-nome='" . $valor['nome'] . "' data-idade='" . $valor['idade'] . "'data-posicao='" . $valor['posicao'] . "'data-gols='" . $valor['gols'] . "'>Deletar</a></td>
                      </tr>";
          }
        }
        echo "</table>";
        echo "</div>";
        }
      } else {
        echo "<p style='text-align:center'>Nenhuma jogador desta foi <a href='../cadastroDeJogador.php'>cadastrado</a></p>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    //      ATUALIZAR

    $(".btn-atualizar").click(function() {
      var id = $(this).attr('data-id');
      var nome = $(this).attr('data-nome');
      var idade = $(this).attr('data-idade');
      var posicao = $(this).attr('data-posicao');
      var gols = $(this).attr('data-gols');

      $('#form_salva').addClass('oculto');
      $('#form_deleta').addClass('oculto');
      $('#form_atualiza').removeClass('oculto');
      $('#div-update').removeClass('oculto');


      $("#id_editado").val(id);
      $("#nome_editado").val(nome);
      $("#idade_editado").val(idade);
      $("#posicao_editado").val(posicao);
      $("#gols_editado").val(gols);

    });

    //      DELETAR

    $(".btn-deletar").click(function() {
      var id = $(this).attr('data-id');
      var nome = $(this).attr('data-nome');
      var idade = $(this).attr('data-idade');
      var posicao = $(this).attr('data-posicao');
      var gols = $(this).attr('data-gols');

      $("#id_deleta").val(id);
      $("#nome_deleta").val(nome);
      $("#idade_deleta").val(idade);
      $("#posicao_deleta").val(posicao);
      $("#gols_deleta").val(gols);

      $('#form_atualiza').addClass('oculto');
      $('#form_deleta').removeClass('oculto');
      $('#div-delete').removeClass('oculto');

    });

    $('#cancelar').click(function() {
      $('#form_atualiza').addClass('oculto');
      $('#form_deleta').addClass('oculto');
      $('#div-update').addClass('oculto');
      $('#div-delete').addClass('oculto');
    });

    $('#cancelar_delete').click(function() {
      $('#form_atualiza').addClass('oculto');
      $('#form_deleta').addClass('oculto');
      $('#div-delete').addClass('oculto');
    });
  </script>
</body>

</html>