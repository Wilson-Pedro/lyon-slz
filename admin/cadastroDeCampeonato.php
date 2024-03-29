<?php
//include('includes/verificacao.php');
?>

<?php

require('../db/conexao.php');

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome_campeonato'];
    $data = $_POST['data_campeonato'];

    $sql = $pdo->prepare("INSERT INTO tblcampeonato VALUES (null,?,?)");
    $sql->execute(array($nome, $data));
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
    <title>Cadastro de campeonato</title>
    <style>
        body {
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
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

        .form-partida {
            padding: 5%;
        }

        .cad-partidaMsgSucesso {
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

        .cad-partidaMsgErro {
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

        .bg-nav {
            background: linear-gradient(55deg, rgb(250, 165, 6), black);
        }

        .font {
            font-size: 8vh;
            /* margin-left: 20vh; */
        }

        .font:hover {
            color: white;
            border-radius: 2vh;
            transition: 2s;
            box-shadow: 5vh 5vh 10vh rgb(97, 52, 0);
        }

        .escudoTime:hover {
            border-radius: 2vh;
            transition: 2s;
            box-shadow: 5vh 5vh 10vh rgb(97, 52, 0);
        }
    </style>
</head>
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
                            <li><a class="dropdown-item" href="cadastroDeJogador.php">CADASTRAR JOGADOR</a></li>
                            <li><a class="dropdown-item" href="cadastroDePartidas.php">CADASTRAR PARTIDA</a></li>

                            <li><a class="dropdown-item" id="marcado" href="cadastroDeCampeonato.php">CADASTRAR CAMPEONATO</a></li>

                            <li><a class="dropdown-item" href="cadastroDeNoticia.php"> CADASTRAR NOTÍCIA</a></li>
                            <li><a class="dropdown-item" href="../index.php">SAIR</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>

<body>

    <section class="form-partida">
        <div class="container-fluid">
            <h1 class="display-5">Cadastro de campeonato</h1>
            <hr>
            <br>
            <form method="post" action="">

                <!-- NOME DO CAMPEONATO -->
                <div class="row">
                    <div class="form-floating col-md-8">
                        <input type="text" class="form-control" id="nome_campeonato" name="nome_campeonato" placeholder="Ex.: Estádio Lourenço Farias. Centro.">
                        <label for="floatingInput text-center">Nome do campeonato</label>
                    </div>
                    <button type="button" class="btn btn-warning col btn-lg" id="limpaLocal" onclick="limpaCampos0()">Limpar</button>
                </div><br>

                <!-- JANELAS DE CONFIRMAÇÃO -->
                <dialog id="cad-partidaConfirmMsg" class="MsgSucesso">
                    <p class="cad-partidaMsgSucesso">Cadastro feito com Sucesso!</p>
                    <a href="cadastro-de-partidas.php"><input type="submit" name="salvar" value="Ok" class="btn-MsgSucesso"></a>
                </dialog>
                <dialog id="cad-partidaConfirmMsgErro" class="MsgErro">
                    <p class="cad-partidaMsgErro">Erro ao realizar o cadastro!</p>
                    <input type="button" id="cancel" value="Ok" class="btn-MsgErro">
                </dialog>

                <!-- DATA -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group input-group-lg">
                            <input type="date" min="" class="form-control" name="data_campeonato" id="data_campeonato" placeholder="14/10/2023">
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning col btn-lg" id="limpaData" onclick="limpaCampos1()">Limpar</button>
                </div><br>

                <!-- CADASTRAR PARTIDA -->
                <input type="submit" id="btn-cadastrar-partida" value="Cadastrar" class="btn btn-success btn-lg" onclick="validaCampos(event)">
                <input type="reset" value="Limpar Tudo" name="btn-cadastrar" id="btn-cadastrar-partida" class="btn btn-danger btn-lg">

            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        var cad_partidaConfirmMsg = document.getElementById('cad-partidaConfirmMsg');
        var cad_partidaConfirmMsgErro = document.getElementById('cad-partidaConfirmMsgErro');
        var nome_campeonato = document.getElementById('nome_campeonato');
        var data_campeonato = document.getElementById('data_campeonato');
        // VALIDAÇÃO DOS CAMPOS DO CAD. DE PARTIDA
        function validaCampos(event) {
            if (nome_campeonato.value == '' || data_campeonato.value == '') {
                alert('Preencha todos os campos para cadastrar uma partida');
            }
            //  else if (typeof partida[0].value === "number") {
            //     alert('Insira um local válido');
            // } else if (typeof partida[1].value === "number") {
            //     alert('Insira um nome do Time A válido');
            // } else if (typeof partida[2].value === "number") {
            //     alert('Insira um nome do Time B válido');
            // } else if (!typeof partida[3].value === "string" && !typeof partida[3].value === "number") {
            //     alert('Insira uma data e horário válidos');
            // } 
            else {
                // mostra a janela de confirmaçao confirmando o cadastro.
                cad_partidaConfirmMsg.showModal();
            }
            // evita do browser recarregar a página sempre que um alert fechar. 
            event.preventDefault();
            return;
        }
        // FECHA A JANELA DE CONFIRMAÇÃO DE ERRO DE CAD.
        cancel.addEventListener('click', function() {
            cad_partidaConfirmMsgErro.close();
        });
        // LIMPA CADA CAMPO
        function limpaCampos0() {
            nome_campeonato.value = '';
        }

        function limpaCampos1() {
            data_campeonato.value = '';
        }

        var dataAtual = new Date();

        // Formata a data atual no formato ISO (AAAA-MM-DD)
        var dataFormatada = dataAtual.toISOString().split('T')[0];

        // Define o valor mínimo do input como a data atual formatada
        data_campeonato.min = dataFormatada;
    </script>
</body>

</html>