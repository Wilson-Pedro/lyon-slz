<?php
require('../../db/conexao.php');

$sql = $pdo->prepare("SELECT tbljogadoress.*, tblposicao.nome_posicao 
FROM tbljogadoress
JOIN tblposicao
ON tbljogadoress.id_posicao = tblposicao.id_posicao
WHERE idade > 9 AND idade <= 11");
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
  <link rel="stylesheet" href="../../css/navHamburguer.css">
  <link rel="stylesheet" href="../../css/layout.css">
  <link rel="stylesheet" href="../../css/timeANDescudo.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="../../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../../css/update-delete.css">

  <title>Sub09</title>
  <style>
    .dp-menu ul li a {
      font-weight: bold;
    }

    body {
      width: 100%;
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
      <source media="(max-width: 261px)" srcset='../../img/imgLogo/lyonSlzEscudo5.png' loading="lazy">

      <source media="(max-width: 269px)" srcset='../../img/imgLogo/lyonSlzEscudo4.png' loading="lazy">

      <source media="(max-width: 311px)" srcset='../../img/imgLogo/lyonSlzEscudo3.png' loading="lazy">

      <source media="(max-width: 375px)" srcset='../../img/imgLogo/lyonSlzEscudo2.png' loading="lazy">

      <img src="../../img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ" loading="lazy">
    </picture>
    <nav class="navbar navbar-expand-lg mt-4">
      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../homeAdmin.php">HOME</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                CATEGORIAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="sub09Admin.php">sub09</a></li>
                <li><a class="dropdown-item" id="marcado" href="sub11Admin.php">sub11</a></li>
                <li><a class="dropdown-item" href="sub13Admin.php">sub13</a></li>
                <li><a class="dropdown-item" href="sub15Admin.php">sub15</a></li>
                <li><a class="dropdown-item" href="sub17Admin.php">sub17</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PARTIDAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../calendarioAdmin.php">CALENDÁRIO DE JOGOS</a></li>
                <li><a class="dropdown-item" href="../jogoDeHojeAdmin.php">JOGOS DE HOJE</a></li>
                <li><a class="dropdown-item" href="../campeonatosAdmin.php">CAMPEONATOS</a></li>
                <li><a class="dropdown-item" href="../historicoPartidasAdmin.php">HISTÓRICO DE PARTIDAS</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../rankingAdmin.php">RANKING</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../noticiaisAdmin.php">NOTÍCIAS</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                MAIS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../cadastroDeJogador.php">CADASTRAR JOGADOR</a></li>
                <li><a class="dropdown-item" href="../cadastroDePartidas.php">CADASTRAR PARTIDA</a></li>
                <li><a class="dropdown-item" href="../cadastroDeCampeonato.php">CADASTRAR CAMPEONATO</a></li>
                <li><a class="dropdown-item" href="../../home.php">SAIR</a></li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </div>

  <main>
    <div class="container-fluid">
      <h1 class="categoria">Categoria Sub-11</h1>
      <hr>
      <!-- ATUALIZAR -->
      <form class="oculto" id="form_atualiza" method="post">
        <div id="div-update" class="oculto">
          <h5 class="inputTitulo">ID:</h5>
          <input type="text" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>

          <h5 class="inputTitulo">Nome:</h5>
          <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" required> <br><br>

          <h5 class="inputTitulo">Sobrenome:</h5>
          <input type="text" id="sobrenome_editado" name="sobrenome_editado" placeholder="Editar sobrenome" required> <br><br>

          <h5 class="inputTitulo">Idade:</h5>
          <input type="number" id="idade_editado" name="idade_editado" placeholder="Editar idade" required><br><br>

          <h5 class="inputTitulo">Posição:</h5>
          <!-- <select class="form-control" name="posicao_editado" id="posicao_editado"> -->
          <?php
          require('../../db/conexao.php');
          $sql_p = $pdo->prepare("SELECT * FROM tblposicao");
          $sql_p->execute();
          $dados_p = $sql_p->fetchAll();
          echo "<select class='form-control' name='posicao_editado' id='posicao_editado'>";

          echo "<option value=''></option>";

          foreach ($dados_p as $chaves => $valor_p) {
            echo "<option 
              value='" . $valor_p['id_posicao'] . "'
              data-posicao='" . $valor_p['nome_posicao'] . "'
                                >" . $valor_p['nome_posicao'] . "</option>";
          }
          echo "</select>";
          ?>

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

          <input type="hidden" id="sobrenome_deleta" name="sobrenome_deleta" placeholder="Editar sobrenome" required> <br><br>

          <input type="hidden" id="idade_deleta" name="idade_deleta" placeholder="Editar idade" required><br><br>

          <input type="hidden" id="posicao_deleta" name="posicao_deleta" placeholder="Editar posicao" required><br><br>

          <input type="hidden" id="gols_deleta" name="gols_deleta" placeholder="Editar gols" required>

          <b>Tem certeza que quer deletar Jogador <span id="cliente"></span></b> <br>
          <button type="submit" id="btn-deletar" name="deletar">Confirmar</button>
          <button type="button" id="cancelar_delete" name="cancelar_delete">Cancelar</button>
          <hr>
        </div>
      </form>
      <br><br>
      <?php
      //PROCESSO DE ATUALIZAÇÃO
      if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['nome_editado']) && isset($_POST['sobrenome_editado']) && isset($_POST['idade_editado']) && isset($_POST['posicao_editado']) && isset($_POST['gols_editado'])) {
        $id = $_POST['id_editado'];
        $nome = $_POST['nome_editado'];
        $sobrenome = $_POST['sobrenome_editado'];
        $idade = $_POST['idade_editado'];
        $id_posicao = $_POST['posicao_editado'];
        $gols = $_POST['gols_editado'];
        $sql = $pdo->prepare("UPDATE tbljogadoress SET nome = :nome , sobrenome = :sobrenome, idade = :idade, id_posicao = :id_posicao, gols = :gols WHERE id= :id");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':sobrenome', $sobrenome);
        $sql->bindValue(':idade', $idade);
        $sql->bindValue(':id_posicao', $id_posicao);
        $sql->bindValue(':gols', $gols);
        $sql->bindValue(':id', $id);
        $sql->execute();
        echo "
          <script>
          var marcado = document.getElementById('marcado');
          marcado.click();
          </script>
          ";
        /*
          $sql = $pdo->prepare("UPDATE tbljogadores SET nome=?,idade=?, posicao=?, gols=? WHERE id=?");
          $sql->execute(array($nome, $idade, $posicao, $gols, $id));
          echo "Atualizado " . $sql->rowCount() . "registros!";*/
      }
      ?>
      <?php
      //DELETAR DADOS
      if (isset($_POST['deletar']) && isset($_POST['id_deleta']) && isset($_POST['nome_deleta']) && isset($_POST['sobrenome_deleta']) && isset($_POST['idade_deleta']) && isset($_POST['posicao_deleta']) && isset($_POST['gols_deleta'])) {
        $id = $_POST['id_deleta'];
        $nome = $_POST['nome_deleta'];
        $sobrenome = $_POST['sobrenome_deleta'];
        $idade = $_POST['idade_deleta'];
        $posicao = $_POST['posicao_deleta'];
        $gols = $_POST['gols_deleta'];
        //COMANDO PARA DELETAR
        $sql = $pdo->prepare("DELETE FROM tbljogadoress WHERE id=? AND nome=? AND sobrenome=? AND idade=? AND id_posicao=? AND gols=?");
        $sql->execute(array($id, $nome, $sobrenome, $idade, $posicao, $gols));
        echo "
          <script>
          var marcado = document.getElementById('marcado');
          marcado.click();
          </script>
          ";
      }
      ?>
      <?php
      if (count($dados) > 0) {
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

          echo "<tr>
                          <td>" . $valor['nome'] . " " . $valor['sobrenome'] . "</td>
                          <td>" . $valor['idade'] . "</td>
                          <td>" . $valor['nome_posicao'] . "</td>
                          <td>" . $valor['gols'] . "</td>
                          <td><a href='#' class='btn-atualizar' data-id='" . $valor['id'] . "' data-nome='" . $valor['nome'] . "' 
                          data-sobrenome='" . $valor['sobrenome'] . "' 
                          data-idade='" . $valor['idade'] . "'
                          data-posicao='" . $valor['id_posicao'] . "'
                          data-gols='" . $valor['gols'] . "'>Atualizar</a> |
                          
                           <a href='#' class='btn-deletar' 
                           data-id='" . $valor['id'] . "' 
                           data-nome='" . $valor['nome'] . "' 
                           data-sobrenome='" . $valor['sobrenome'] . "'
                           data-idade='" . $valor['idade'] . "'
                           data-posicao='" . $valor['id_posicao'] . "'
                           data-gols='" . $valor['gols'] . "'>Deletar</a></td>
                      </tr>";
        }
        echo "</table>";
        echo "</div>";
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>
    //      ATUALIZAR

    $(".btn-atualizar").click(function() {
      var id = $(this).attr('data-id');
      var nome = $(this).attr('data-nome');
      var sobrenome = $(this).attr('data-sobrenome');
      var idade = $(this).attr('data-idade');
      var posicao = $(this).attr('data-posicao');
      var gols = $(this).attr('data-gols');

      $('#form_salva').addClass('oculto');
      $('#form_deleta').addClass('oculto');
      $('#form_atualiza').removeClass('oculto');
      $('#div-update').removeClass('oculto');


      $("#id_editado").val(id);
      $("#nome_editado").val(nome);
      $("#sobrenome_editado").val(sobrenome);
      $("#idade_editado").val(idade);
      $("#posicao_editado").val(posicao);
      $("#gols_editado").val(gols);

    });

    //      DELETAR

    $(".btn-deletar").click(function() {
      var id = $(this).attr('data-id');
      var nome = $(this).attr('data-nome');
      var sobrenome = $(this).attr('data-sobrenome');
      var idade = $(this).attr('data-idade');
      var posicao = $(this).attr('data-posicao');
      var gols = $(this).attr('data-gols');

      $("#id_deleta").val(id);
      $("#nome_deleta").val(nome);
      $("#sobrenome_deleta").val(sobrenome);
      $("#idade_deleta").val(idade);
      $("#posicao_deleta").val(posicao);
      $("#gols_deleta").val(gols);

      $('#form_atualiza').addClass('oculto');
      $('#form_deleta').removeClass('oculto');
      $('#div-delete').removeClass('oculto');

    });

    //CANCELAR

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