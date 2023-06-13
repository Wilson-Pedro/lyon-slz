<?php
require('../db/conexao.php');

if (isset($_POST['salvar'])) {
    $nome = $_POST['jogadorNome'];
    $sobrenome = $_POST['jogadorSobrenome'];
    $idade = $_POST['jogadorIdade'];
    $posicao = $_POST['jogadorPosicao'];
    $gols = $_POST['jogadorGols'];

    $sql = $pdo->prepare("INSERT INTO tbljogadoress VALUES (null,?,?,?,?,?)");
    $sql->execute(array($nome, $sobrenome, $idade, $posicao, $gols));
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon/favicon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navHamburguer.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/timeANDescudo.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">

    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
    <title>Cadastro de jogador</title>
    <style>
        body {
            background: white;
        }

        h1.display-5 {
            font-weight: normal;
        }

        .dp-menu ul li a {
            font-weight: bold;
        }

        .dp-menu ul li a:hover {
            color: black;
        }

        .form-jogador {
            padding: 5%;

        }

        .cad-jogadorMsgSucesso {
            font-size: large;
        }

        .MsgSucesso {
            border-radius: 2vh;
            border: transparent;
        }

        .btn-MsgSucesso {
            border-radius: 2vh;
            border: transparent;
            font-size: large;
            background-color: rgb(0, 205, 0);
            padding: 2vh;
            padding-left: 20vh;
            padding-right: 20vh;
            cursor: pointer;
        }

        .btn-MsgSucesso:hover {
            background: rgb(0, 225, 0);
            box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
        }

        .cad-jogadorMsgErro {
            font-size: large;
        }

        .MsgErro {
            border-radius: 2vh;
            border: transparent;
        }

        .btn-MsgErro {
            border-radius: 2vh;
            border: transparent;
            font-size: large;
            background-color: rgb(200, 0, 0);
            padding: 2vh;
            padding-left: 20vh;
            padding-right: 20vh;
            cursor: pointer;
        }

        .btn-MsgErro:hover {
            background: rgb(225, 0, 0);
            box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                MAIS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" id="marcado" href="cadastroDeJogador.php">CADASTRAR JOGADOR</a></li>
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

    <section class="form-jogador">
        <div class="container-fluid">
            <h1 class="display-5">Cadastro de jogador</h1>
            <hr>
            <br>
            <form method="post" action="">
                <div class="row">
                    <!-- NOME -->
                    <div class="form-floating col-md-8">
                        <input type="text" class="form-control" id="jogadorNome" name="jogadorNome" placeholder="Ex.: José ">
                        <label for="floatingInput text-center">Nome</label>
                    </div>
                    <button type="button" class="btn btn-warning col " id="limpaNome" onclick="limpaCampos0()">Limpar</button>
                </div><br>

                <div class="row">
                    <!-- SOBRENOME -->
                    <div class="form-floating col-md-8">
                        <input type="text" class="form-control" id="jogadorSobrenome" name="jogadorSobrenome" placeholder="Ex.: Silva">
                        <label for="floatingInput text-center">Sobrenome</label>
                    </div>
                    <button type="button" class="btn btn-warning col " id="limpaSobrome" onclick="limpaCampos4()">Limpar</button>
                </div><br>

                <!-- IDADE -->
                <div class="row">
                    <div class="form-floating col-md-8">
                        <input type="text" class="form-control" id="jogadorIdade" name="jogadorIdade" placeholder="Ex.: Sub-14" maxlength="6">
                        <label for="floatingInput text-center">Idade</label>
                    </div>
                    <button type="button" class="btn btn-warning col btn-lg" id="limpaIdade" onclick="limpaCampos1()">Limpar</button>
                </div><br>
                <dialog id="cad-jogadorConfirmMsg" class="MsgSucesso">
                    <p class="cad-jogadorMsgSucesso">Cadastro feito com Sucesso!</p>
                    <a href="cadastro-de-jogador.php"><input type="submit" name="salvar" value="Ok" class="btn-MsgSucesso"></a>
                </dialog>
                <dialog id="cad-jogadorConfirmMsgErro" class="MsgErro">
                    <p class="cad-jogadorMsgErro">Erro ao realizar o cadastro!</p>
                    <a href="cadastro.php"><input type="button" value="Ok" class="btn-MsgErro"></a>
                </dialog>
                <div class="row">
                    <!-- POSIÇÃO -->
                    <div class="form-floating col-md-8">
                        <input type="text" class="form-control" id="jogadorPosicao" name="jogadorPosicao" placeholder="Ex.: Atacante">
                        <label for="floatingInput text-center">Posição</label>
                    </div>
                    <button type="button" class="btn btn-warning col btn-lg" id="limpaPosicao" onclick="limpaCampos2()">Limpar</button>
                </div><br>
                <div class="row">
                    <!-- GOLS -->
                    <div class="form-floating col-md-8">
                        <input type="text" class="form-control" id="jogadorGols" name="jogadorGols" placeholder="Ex.: 27">
                        <label for="floatingInput text-center">Gols</label>
                    </div>
                    <button type="button" class="btn btn-warning col btn-lg" id="limpaGols" onclick="limpaCampos3()">Limpar</button>
                </div><br>
                <!-- CADASTRAR JOGADOR -->
                <input type="submit" id="btn-cadastrar" value="Cadastrar jogador" class="btn btn-success btn-lg" onclick="validaCampos(event)">
                <input type="reset" value="Limpar campos" name="btn-cadastrar" id="btn-cadastrar" class="btn btn-danger btn-lg">
            </form>
        </div>
    </section>
    <script>
        var cad_jogadorConfirmMsg = document.getElementById('cad-jogadorConfirmMsg');
        var jogador = [
            document.getElementById('jogadorNome'),
            document.getElementById('jogadorIdade'),
            document.getElementById('jogadorPosicao'),
            document.getElementById('jogadorGols'),
            document.getElementById('jogadorSobrenome')
        ];

        function validaCampos(event) {
            if (jogador[0].value == '' || jogador[1].value == '' || jogador[2].value == '' || jogador[3].value == '' || jogador[4].value == '') {
                alert('Preencha todos os campos para cadastrar um jogador');
            } else if (typeof jogador[0].value === "number") {
                alert('Insira uma nome e sobrenomes válidos');

            } else if (!typeof jogador[1].value === "string" && !typeof jogador[1].value === "number") {
                alert('Insira uma idade válida');

            } else if (typeof jogador[2].value === "number") {
                alert('Insira uma posição válida');

            } else if (!typeof jogador[3].value === "number") {
                alert('Insira uma média de gols válido');

            } else {
                cad_jogadorConfirmMsg.showModal();
            }
            event.preventDefault();
            return;
        }

        function limpaCampos0() {
            jogador[0].value = '';
        }

        function limpaCampos1() {
            jogador[1].value = '';
        }

        function limpaCampos2() {
            jogador[2].value = '';
        }

        function limpaCampos3() {
            jogador[3].value = '';
        }

        function limpaCampos4() {
            jogador[4].value = '';
        }
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>