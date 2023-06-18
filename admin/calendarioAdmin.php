<?php
include('../db/conexao.php');

$sql = $pdo->prepare("SELECT tblpartidass.*, tblcampeonato.nome_campeonato
FROM tblpartidass
JOIN tblcampeonato ON tblpartidass.id_campeonato = tblcampeonato.id_campeonato
");
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
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/calendario.css">
  <link rel="stylesheet" href="../css/timeANDescudo.css">
  <link rel="stylesheet" href="../css/update-delete.css">
  <title>Calendario</title>
</head>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
  }

  #calendarioDeJogos {
    text-align: center;
    padding-top: 5vh;
    font-weight: bold;
  }

  table {
    width: 100%;
  }

  td,
  th {
    padding: 5px;
    text-align: center;
    border: solid 1px black;
    font-size: 11px;
  }

  header>nav>ul>li>a {
    font-size: 86%;
  }

  .dp-menu ul li a {
    font-weight: bold;
  }

  .oculto {
    display: none;
  }

  form#form_deleta {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  form#form_deleta>div {
    border: 1px solid black;
    padding: 5%;
  }

  form#form_deleta>div>button {
    cursor: pointer;
    margin: auto;
    padding: 14px;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 5px;
  }

  #cancelar_delete,
  #btn-deletar {
    background-color: red;
    margin-left: 3vw;
  }

  #cancelar:hover {
    background-color: rgb(158, 3, 3);
  }

  main {
    width: 100%;
  }
</style>

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
              <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                PARTIDAS
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" id="marcado" href="calendarioAdmin.php">CALENDÁRIO DE JOGOS</a></li>
                <li><a class="dropdown-item" href="jogoDeHojeAdmin.php">JOGOS DE HOJE</a></li>
                <li><a class="dropdown-item" href="campeonatosAdmin.php">CAMPEONATOS</a></li>
                <li><a class="dropdown-item" href="historicoPartidasAdmin.php">HISTÓRICO DE PARTIDAS</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="rankingAdmin.php">RANKING</a>
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
      <h1 id="calendarioDeJogos">CALENDÁRIO DE JOGOS</h1>
      <!-- ATUALIZAR -->
      <form class="oculto" id="form_atualiza" method="post">
        <div id="div-update" class="oculto">
          <h5>ID:</h5>
          <input type="text" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>
          <h5>Local:</h5>
          <input type="text" id="localidade_editado" name="localidade_editado" placeholder="Editar local" required> <br><br>
          <h5>Time B:</h5>
          <input type="text" id="timeb_editado" name="timeb_editado" placeholder="Editar time B" required><br><br>
          <h5>Data:</h5>
          <input type="date" id="data_partida_editado" name="data_partida_editado" placeholder="Editar Data" required><br><br>
          <h5>Horário:</h5>
          <input type="time" id="horario_editado" name="horario_editado" placeholder="Editar horário" required><br><br>
          <button type="submit" name="atualizar" id="btn-atualizar">Atualizar</button>
          <button type="button" id="cancelar" name="cancelar">Cancelar</button>
          <hr>
        </div>
      </form>
      <!-- DELETAR -->
      <form class="oculto" id="form_deleta" method="post">
        <div id="div-delete" class="oculto">
          <input type="hidden " id="id_deleta" name="id_deleta" placeholder="ID" required> <br><br>
          <input type="hidden" id="localidade_deleta" name="localidade_deleta" placeholder="Editar local" required> <br><br>
          <input type="hidden" id="timeb_deleta" name="timeb_deleta" placeholder="Editar Time B" required><br><br>
          <input type="hidden" id="data_partida_deleta" name="data_partida_deleta" placeholder="Editar Data" required> <br><br>
          <h5 id="timeb_deleta" name="timeb_deleta"> <?php $timeb; ?></h5>
          <h4>Tem certeza que quer deletar partida? <span id="cliente"></span></h4><br>
          <button type="submit" id="btn-deletar" name="deletar">Confirmar</button>
          <button type="button" id="cancelar_delete" name="cancelar_delete">Cancelar</button>
          <hr>
        </div>
      </form>
      <br><br>
      <?php
      //PROCESSO DE ATUALIZAÇÃO
      if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['localidade_editado']) && isset($_POST['timeb_editado']) && isset($_POST['data_partida_editado']) && isset($_POST['horario_editado'])) {
        $id = $_POST['id_editado'];
        $localidade = $_POST['localidade_editado'];
        $timeb = $_POST['timeb_editado'];
        $data_partida = $_POST['data_partida_editado'];
        $horario = $_POST['horario_editado'];
        $sql = $pdo->prepare("UPDATE tblpartidass SET localidade = :localidade, adversario = :adversario, data_partida = :data_partida, horario = :horario WHERE id= :id");
        $sql->bindValue(':localidade', $localidade);
        $sql->bindValue(':adversario', $timeb);
        $sql->bindValue(':data_partida', $data_partida);
        $sql->bindValue(':horario', $horario);
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
      if (isset($_POST['deletar']) && isset($_POST['id_deleta']) && isset($_POST['localidade_deleta']) && isset($_POST['timeb_deleta']) && isset($_POST['data_partida_deleta'])) {
        $id = $_POST['id_deleta'];
        $localidade = $_POST['localidade_deleta'];
        $timeb = $_POST['timeb_deleta'];
        $data_partida = $_POST['data_partida_deleta'];
        //COMANDO PARA DELETAR
        $sql = $pdo->prepare("DELETE FROM tblpartidass WHERE id=? AND localidade=? AND adversario=? AND data_partida=?");
        $sql->execute(array($id, $localidade, $timeb, $data_partida));
        echo "
          <script>
          var marcado = document.getElementById('marcado');
          marcado.click();
          </script>
          ";
      }
      ?>
      <?php
      $data_Atual = date("Y-m-d");
      if (count($dados) > 0) {
        echo "<div class='table table-responsive table-striped'>";
        echo "<table class='table table-striped'>
        <thead class=table-dark>
        <tr>
            <th>JOGOS</th>
            <th>LOCAL</th>
            <th>DATA</th>
            <th>HORARIO</th>
            <th>EDITAR</th>
        </tr>
        </thead>";
        foreach ($dados as $chaves => $valor) {
          $dataJogo = $valor['data_partida'];
          if (strtotime($dataJogo) >= strtotime($data_Atual)) {
            echo "<tr>
                <td><abbr title='". $valor['nome_campeonato'] ."'>" . "LyonX" . $valor['adversario'] . "</abbr></td>
                <td>" . $valor['localidade'] . "</td>
                <td>" . date("d/m", strtotime($valor['data_partida'])) . "</td>
                <td>" . date("H:i", strtotime($valor['horario'])) . "</td>
                <td><a href='#' class='btn-atualizar' 
                data-id='" . $valor['id'] . "' 
                data-localidade='" . $valor['localidade'] . "'
                data-timeb='" . $valor['adversario'] . "'
                data-data_partida='" . $valor['data_partida'] . "'
                data-horario='" . date("H:i", strtotime($valor['horario'])) . "'
                >Atualizar</a> | <a href='#' class='btn-deletar' 
                data-id='" . $valor['id'] . "' 
                data-localidade='" . $valor['localidade'] . "' 
                data-timeb='" . $valor['adversario'] . "'
                data-data_partida='" . $valor['data_partida'] . "'
                >Deletar</a></td>
          </tr>";
          }
        }
        echo "</table>";
        echo "</div>";
      } else {
        echo "<p class='mt-4' style='text-align:center'>Nenhuma partida foi <a href='cadastroDePartidas.php'>cadastrada</a></p>";
      }
      ?>
    </div>
  </main>
  <footer>
    <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
  </footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
  //      ATUALIZAR

  $(".btn-atualizar").click(function() {
    var id = $(this).attr('data-id');
    var localidade = $(this).attr('data-localidade');
    var timeb = $(this).attr('data-timeb');
    var data_partida = $(this).attr('data-data_partida');
    var horario = $(this).attr('data-horario');

    $('#form_salva').addClass('oculto');
    $('#form_deleta').addClass('oculto');
    $('#form_atualiza').removeClass('oculto');
    $('#div-update').removeClass('oculto');


    $("#id_editado").val(id);
    $("#localidade_editado").val(localidade);
    $("#timeb_editado").val(timeb);
    $("#data_partida_editado").val(data_partida);
    $("#horario_editado").val(horario)

  });

  //      DELETAR

  $(".btn-deletar").click(function() {
    var id = $(this).attr('data-id');
    var localidade = $(this).attr('data-localidade');
    var timeb = $(this).attr('data-timeb');
    var data_partida = $(this).attr('data-data_partida');
    var horario = $(this).attr('data-horario');

    $("#id_deleta").val(id);
    $("#localidade_deleta").val(localidade);
    $("#timeb_deleta").val(timeb);
    $("#data_partida_deleta").val(data_partida);

    $('#form_atualiza').addClass('oculto');
    $('#form_deleta').removeClass('oculto');
    $('#div-delete').removeClass('oculto');


  });

  //      OCULTAR

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

</html>