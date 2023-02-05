<?php
include('../html/db/conexao.php');

$pasta = "../img/imgArquivos/";
$sql = $pdo->prepare("SELECT * FROM tblfotoss");
$sql->execute();
$dados = $sql->fetchAll();

if (isset($_POST['deletar'])) {
  $sql = $pdo->prepare("DELETE FROM tblfotoss");
  $sql->execute();
  if (count($dados) > 0) {
    foreach ($dados as $chaves => $valor) {
      unlink("../img/imgArquivos/" . $valor['arquivo']);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../css/timeANDescudo.css">
  <link rel="stylesheet" href="lyon.jpg">
  <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/navegacao.css">
  <link rel="stylesheet" href="../css/navResponsivo.css">
  <title>Fotos</title>
</head>
<style>
  #body {
    max-width: 100%;
    background-color: rgb(214, 168, 100);
  }

  h1 {
    text-align: center;
  }

  .logo {
    font-weight: bold;
  }

  main {
    margin: auto;
    background-color: rgb(255, 255, 255);
    min-height: 100vh;
    display: block;
    margin: auto;
    width: 92vw;
    box-shadow: 0px 2px 5px 0px black;
  }

  form {
    display: inline-block;
  }

  dialog {
    height: 30vh;
    min-width: 30vw;
    border: 1px 1px 1px black;
  }

  dialog>h2 {
    text-align: center;
    font-size: 20pt;
    margin-top: 4vh;
  }

  dialog>form>button {
    margin: 10px;
  }

  dialog::backdrop {
    background-color: rgba(54, 54, 54, 0.699);
  }

  button {
    color: white;
  }

  form#form_img_deleta {
    text-align: center;
    align-items: center;
    justify-content: center;
    width: 50vw;
    padding: 10px;
    margin-top: 2vw;
    margin-left: 20vw;
  }

  form#form_img_deleta>button {
    background-color: rgb(206, 42, 42);
    padding: 10px;
    border-radius: 6px;
    border: none;
    margin-left: 1vw;
  }

  form#form_img_deleta>button:hover {
    background-color: rgb(179, 29, 29);
  }

  button>a.ancora {
    color: white;
    text-decoration: none;
  }

  button.btn-deletar {
    display: block;
    margin: auto;
    background-color: rgb(206, 42, 42);
    padding: 10px;
    border-radius: 6px;
    border: none;
  }

  button.btn-deletar:hover {
    background-color: rgb(179, 29, 29);
  }

  .hidden {
    display: none;
  }

  footer {
    background-color: #343a40;
    padding: 10px;
  }

  footer>p {
    text-align: center;
    color: white;
    font-weight: bold;
  }

  div#fotos>img {
    display: block;
    margin: auto;
  }

  div#botoes {
    text-align: center;
  }

  .oculto {
    display: none;
  }

  a.nav-link:hover {
    color: rgb(0, 0, 0);
  }

</style>

<body id="body">

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
            <a class="nav-link" href="#">JOGADORES</a>
            <ul class="sub-menu" id="sobrepor">
              <li>
                <a href="subsAdmin/sub09Admin.php">sub09</a>
                <a href="subsAdmin/sub11Admin.php">sub11</a>
                <a href="subsAdmin/sub13Admin.php">sub13</a>
                <a href="subsAdmin/sub15Admin.php">sub15</a>
                <a href="subsAdmin/sub17Admin.php">sub17</a>
              </li>
              <li>
                <a href="rankingAdmin.php">RANKING</a>
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
                <a href="../html/home.php">Sair</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  </div>

  <main>
    <br>
    <h1>
      <i class="fa-solid fa-2x fa-camera"></i>
      <span class="logo">FOTOS DO TIME</span>
    </h1>
    <div class="container-fluid mt-3">

      <div id="botoes">
        <form action="envia.php" method="POST" enctype="multipart/form-data">
          <button type="button" class="btn btn-primary" onclick="escolher()">Escolher Foto</button>
          <input class="hidden" type="file" id="arquivo" name="arquivo[]" multiple="multiple" value="">
          <button type="submit" value="Enviar" id="postar" class="btn btn-primary" onclick="postar()" disabled>Postar foto</button>
        </form>
        <button onclick="DeleteALL()" class="btn btn-danger">Deletar Tudo</button>

        <!-- DIALOG -->
        <dialog>
          <h2>Deletar todas as Imagens?</h2>
          <form action="" method="POST">
            <button id="nao" onclick="nao()" class="btn btn-danger mt-4">Não</button>
            <button id="sim" type="submit" id="deletar" name="deletar" class="btn btn-danger mt-4">Sim</button>
          </form>
        </dialog>

      </div>
      <div id="fotos">
        <?php include('lista-admin.php'); ?>
      </div>
  </main>
  </div>
  <footer>
    <p>Escolinha de Futebol LYON SLZ</p>
  </footer>
  <script>
    var modal = document.querySelector('dialog')
    var arquivo = document.getElementById('arquivo');

    function escolher() {
      arquivo.click()
      document.getElementById('postar').disabled = false;
    }

    function postar() {
      document.getElementById('postar').disabled = true;
    }

    function DeleteALL() {
      modal.showModal();
    }

    function nao() {
      modal.close();
    }
  </script>
</body>

</html>