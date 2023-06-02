<?php
require('db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tblpartidass ORDER BY id LIMIT 0, 1000");
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
    <link rel="stylesheet" href="lyon.jpg">
    <link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/calendario.css">
    <link rel="stylesheet" href="../css/timeANDescudo.css">
    <link rel="stylesheet" href="../css/navResponsivo.css">
    <link rel="stylesheet" href="../css/navegacao.css">
    <title>Histório de Partidas</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        max-width: 100%;
        background-color: rgb(214, 168, 100);
    }

    table {
        width: 80vw;
        border-collapse: collapse;
        background-color: rgb(243, 231, 231);
        color: black;
        margin: auto;
        margin-top: 6vh;
    }

    td,
    th {
        text-align: center;
        border: 1px solid rgb(0, 0, 0);
    }

    #calendarioDeJogos {
        text-align: center;
        padding-top: 5vh;
        font-weight: bold;
        padding-bottom: 3vh;
    }

    .dp-menu ul li a {
        font-weight: bold;
    }

    main {
        width: 99.5%;
    }
</style>

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
                        <a class="nav-link" href="home.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CATEGORIAS</a>
                        <ul class="sub-menu" id="sobrepor">
                            <li>
                                <a href="subs/sub09.php">sub09</a>
                                <a href="subs/sub11.php">sub11</a>
                                <a href="subs/sub13.php">sub13</a>
                                <a href="subs/sub15.php">sub15</a>
                                <a href="subs/sub17.php">sub17</a>
                            </li>
                            <li>
                                <a href="ranking.php">RANKING</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="marcado">PARTIDAS</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="calendario.php">CALENDÁRIO DE JOGOS</a>
                                <a href="historicoPartidas.php" id="marcado">HISTÓRICO DE PARTIDAS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticiais.php">NOTÍCIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MAIS</a>
                        <ul class="sub-menu" id="sobrepor">
                            <li>
                                <a href="login.php">Logar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <main>
        <div class="container-fluid">
            <div class="container-fluid">
                <h1 id="calendarioDeJogos">HISTÓRICO DE PARTIDAS</h1>
            </div>
            <?php
            $data_Atual = date("Y-m-d");
            if (count($dados) > 0) {
                echo "<table class='table table-striped'>
            <thead class=table-dark>
            <tr>
                <th>JOGOS</th>
                <th>RESULTADO</th>
                <th>DATA</th>
            </tr>
            </thead>";
                foreach ($dados as $chaves => $valor) {
                    $dataJogo = $valor['data_partida'];
                    if (strtotime($dataJogo) <= strtotime($data_Atual)) {
                        echo "<tr>
              <td>" . "Lyon X " . $valor['timeb'] . "</td>
              <td>" . $valor['gols_lyon'] . " x " . $valor['gols_adv'] . "</td>
              <td>" . date("d/m/y", strtotime($valor['data_partida'])) . "</td>
            
                </tr>";
                    }
                }
                echo "</table>";
            } else {
                echo "<br><p class='mt-4' style='text-align:center' >Nenhum jogador cadastrado</p>";
            }
            ?>
        </div>
    </main>
    <footer>
        <p class="mb-0">Escolinha de Futebol LYON SLZ</p>
    </footer>
</body>

</html>