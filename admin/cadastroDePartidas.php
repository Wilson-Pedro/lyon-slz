<?php
require('../user/db/conexao.php');

if (isset($_POST['salvar'])) {
    $local = $_POST['partidaLocal'];
    $timeB = $_POST['partidaTimeB'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $gols_lyon = 0;
    $gols_adv = 0;

    $sql = $pdo->prepare("INSERT INTO tblpartidass VALUES (null,?,?,?,?,?,?)");
    $sql->execute(array($local, $timeB, $data, $horario, $gols_lyon, $gols_adv));
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/timeANDescudo.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/navegacao.css">
    <link rel="stylesheet" href="../css/navResponsivo.css">
    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
    <title>Cadastro de partidas</title>
    <style>
        body {
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
                    <a class="nav-link" href="#">CATEGORIAS</a>
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
                    <a class="nav-link" href="#" id="marcado">MAIS</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="cadastroDeJogador.php">Cadastrar Jogador</a>
                            <a href="cadastroDePartidas.php" id="marcado">Cadastrar partida</a>
                            <a href="../user/home.php">Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
</div>

<body>

    <section class="form-partida">
        <h1 class="display-5">Cadastro de partidas</h1>
        <hr>
        <br>
        <form method="post" action="">

            <!-- LOCAL -->
            <div class="row">
                <div class="form-floating col-md-8">
                    <input type="text" class="form-control" id="partidaLocal" name="partidaLocal" placeholder="Ex.: Estádio Lourenço Farias. Centro.">
                    <label for="floatingInput text-center">Local</label>
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

            <!-- TIME B -->
            <div class="row">
                <div class="form-floating col-md-8">
                    <input type="text" class="form-control" id="partidaTimeB" name="partidaTimeB" placeholder="Ex.: Manchester United do Maranhão">
                    <label for="floatingInput text-center">Time Adversário</label>
                </div>
                <button type="button" class="btn btn-warning col btn-lg" id="limpaTimeB" onclick="limpaCampos2()">Limpar</button>
            </div><br>

            <!-- DATA -->
            <div class="row">
                <div class="col-md-8">
                    <label for="text-center" class="form-label">Data</label>
                    <div class="input-group input-group-lg">
                        <input type="date" class="form-control" name="data" id="partidaHorarioData" placeholder="14/10/2023">
                    </div>
                </div>
                <button type="button" class="btn btn-warning col btn-lg" id="limpaData" onclick="limpaCampos3()">Limpar</button>
            </div><br>

            <!-- HORÁRIO -->
            <div class="row">
                <div class="col-md-8">
                    <label for="text-center" class="form-label">Horário</label>
                    <div class="input-group input-group-lg">
                        <input type="time" class="form-control" name="horario" id="partidaHorarioData" placeholder="14/10/2023 às 11:30">
                    </div>
                </div>
                <button type="button" class="btn btn-warning col btn-lg" id="limpaData" onclick="limpaCampos3()">Limpar</button>
            </div><br>

            <!-- CADASTRAR PARTIDA -->
            <input type="submit" id="btn-cadastrar-partida" value="Cadastrar partida" class="btn btn-success btn-lg" onclick="validaCampos(event)">
            <input type="reset" value="Limpar todos os campos" name="btn-cadastrar" id="btn-cadastrar-partida" class="btn btn-danger btn-lg">
        </form>
    </section>
    <script src="../js/cadastro-partidas.js"></script>
</body>

</html>