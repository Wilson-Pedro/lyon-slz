<?php
require('../../db/conexao.php');

$sql = $pdo->prepare("SELECT tbljogadoress.*,tblmodalidade.*, tblposicao.nome_posicao 
FROM tbljogadoress
JOIN tblposicao ON tbljogadoress.id_posicao = tblposicao.id_posicao 
JOIN tblmodalidade ON tblposicao.id_modalidade = tblmodalidade.id_modalidade
WHERE idade > 7 AND idade <= 9");
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
    body {
      width: 100%;
      font-family: Arial, Helvetica, sans-serif;
    }

    .dp-menu ul li a {
      font-weight: bold;
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

    .id_oculto {
      display: none;
    }

    .atualizar {
      text-align: center;
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
                <li><a class="dropdown-item" id="marcado" href="sub09Admin.php">sub09</a></li>
                <li><a class="dropdown-item" href="sub11Admin.php">sub11</a></li>
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
                <li><a class="dropdown-item" href="../cadastroDeNoticia.php"> CADASTRAR NOTÍCIA</a></li>
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
      <h1 class="categoria">Categoria Sub-09</h1>
      <hr>
      <!-- ATUALIZAR -->
      <form class="oculto" id="form_atualiza" method="post">
        <div id="div-update" class="oculto">
          <h4 class="atualizar">ATUALIZAR</h4>
          <input type="text" class="id_oculto" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>

          <h5 class="inputTitulo">Nome:</h5>
          <input type="text" id="nome_editado" name="nome_editado" placeholder="Editar nome" required> <br><br>

          <h5 class="inputTitulo">Sobrenome:</h5>
          <input type="text" id="sobrenome_editado" name="sobrenome_editado" placeholder="Editar sobrenome" required> <br><br>

          <h5 class="inputTitulo">Idade:</h5>
          <input type="number" id="idade_editado" name="idade_editado" placeholder="Editar idade" required><br><br>

          <h5 class="inputTitulo">Modalidade:</h5>
          <select class='form-control' name='modalidade_editado' id='modalidade_editado' onchange="atualizarSegundoSelect()">
            <option value=''></option>
            <option value='1' data-modalidade='1'>Futsal</option>
            <option value='2' data-modalidade='2'>Futebol</option>
          </select>

          <h5 class="inputTitulo">Posição:</h5>
          <!-- <select class="form-control" name="posicao_editado" id="posicao_editado"> -->
          <select class='form-control' name='posicao_editado' id='posicao_editado'>
            <option value=""></option>
            <option value="1" data-posicao='Goleiro'>Goleiro</option>
            <option value="2" data-posicao='Zagueiro'>Zagueiro</option>
            <option value="3" data-posicao='Meio'>Meio</option>
            <option value="4" data-posicao='Lateral'>Lateral</option>
            <option value="5" data-posicao='Lateral Direito'>Lateral Direito</option>
            <option value="6" data-posicao='Lateral Esquerdo'>Lateral Esquerdo</option>
            <option value="10" data-posicao='Ataquante'>Ataquante</option>
            <option value="11" data-posicao='Centrovante'>Centrovante</option>
            <option value="13" data-posicao='Goleiro'>Goleiro</option>
            <option value="14" data-posicao='Fixo'>Fixo</option>
            <option value="7" data-posicao='Ala'>Ala</option>
            <option value="8" data-posicao='Ala Direito'>Ala Direito</option>
            <option value="9" data-posicao='Ala Esquerdo'>Ala Esquerdo</option>
            <option value="12" data-posicao='Pivô'>Pivô</option>
          </select>

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
          <input type="hidden" class="id_oculto" id="id_deleta" name="id_deleta" placeholder="ID" required> <br><br>
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
        /*
          $sql = $pdo->prepare("UPDATE tbljogadores SET nome=?,idade=?, posicao=?, gols=? WHERE id=?");
          $sql->execute(array($nome, $idade, $posicao, $gols, $id));
          echo "Atualizado " . $sql->rowCount() . "registros!";*/
        echo "
          <script>
          var marcado = document.getElementById('marcado');
          marcado.click();
          </script>
          ";
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
                          <td> <abbr title='" . $valor['modalidade'] . "'>" . $valor['nome_posicao'] . "</abbr></td>
                          <td>" . $valor['gols'] . "</td>
                          <td><a href='#' class='btn-atualizar' 
                          data-id='" . $valor['id'] . "' 
                          data-nome='" . $valor['nome'] . "' 
                          data-sobrenome='" . $valor['sobrenome'] . "' 
                          data-idade='" . $valor['idade'] . "'
                          data-modalidade='" . $valor['id_modalidade'] . "'
                          data-posicao='" . $valor['id_posicao'] . "'
                          data-gols='" . $valor['gols'] . "'>Atualizar</a> |
                          
                           <a href='#' class='btn-deletar' 
                           data-id='" . $valor['id'] . "' 
                           data-nome='" . $valor['nome'] . "' 
                           data-sobrenome='" . $valor['sobrenome'] . "'
                           data-idade='" . $valor['idade'] . "'
                           data-modalidade='" . $valor['id_modalidade'] . "'
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
      var modalidade = $(this).attr('data-modalidade');
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
      $("#modalidade_editado").val(modalidade);
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

    //POSIÇÕES DO FUTEBOL
    var posicaoFutebol = [{
        id: 1,
        posicao: 'Goleiro'
      },
      {
        id: 2,
        posicao: 'Zagueiro'
      },
      {
        id: 3,
        posicao: 'Meio'
      },
      {
        id: 4,
        posicao: 'Lateral'
      },
      {
        id: 5,
        posicao: 'Lateral Direito'
      },
      {
        id: 6,
        posicao: 'Lateral Esquerdo'
      },
      {
        id: 10,
        posicao: 'Ataquante'
      },
      {
        id: 11,
        posicao: 'Centrovante'
      },
    ];

    //POSIÇÕES DO FUTSAL
    var posicaoFutsal = [{
        id: 13,
        posicao: 'Goleiro'
      },
      {
        id: 14,
        posicao: 'Fixo'
      },
      {
        id: 7,
        posicao: 'Ala'
      },
      {
        id: 8,
        posicao: 'Ala Direito'
      },
      {
        id: 9,
        posicao: 'Ala Esquerdo'
      },
      {
        id: 12,
        posicao: 'Pivô'
      }
    ];

    function atualizarSegundoSelect() {
      var modalidade = document.getElementById("modalidade_editado");
      var jogadorPosicao = document.getElementById("posicao_editado");
      var opcaoSelecionada = modalidade.value;

      // Limpar as opções do segundo select
      jogadorPosicao.innerHTML = "";

      // Adicionar as opções de acordo com a seleção no primeiro select
      if (opcaoSelecionada === "1") {
        for (var i = 0; i <= 5; i++) {
          var option = document.createElement("option");
          option.text = posicaoFutsal[i].posicao;
          option.value = posicaoFutsal[i].id;
          jogadorPosicao.add(option);
        }
      } else if (opcaoSelecionada === "2") {
        for (var i = 0; i <= 7; i++) {
          var option = document.createElement("option");
          option.text = posicaoFutebol[i].posicao;
          option.value = posicaoFutebol[i].id;
          jogadorPosicao.add(option);
        }
      } else {
        // Caso a opção selecionada seja "todos", adicionar todas as opções
        var option = document.createElement("option");
        option.text = "";
        option.value = "";
        jogadorPosicao.add(option);
      }
    }
  </script>
</body>

</html>