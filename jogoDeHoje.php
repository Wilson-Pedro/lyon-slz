<?php
include('admin/include/logout.php');
?>

<?php
include('db/conexao.php');

$sql = $pdo->prepare("SELECT tblpartidass.*, tblcampeonato.nome_campeonato
FROM tblpartidass
JOIN tblcampeonato ON tblpartidass.id_campeonato = tblcampeonato.id_campeonato 
ORDER BY tblpartidass.horario");
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
    <link rel="stylesheet" href="css/navHamburguer.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="lyon.jpg">
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/timeANDescudo.css">
    <link rel="stylesheet" href="css/update-delete.css">
    <title>Jogos de Hoje</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
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
        font-size: 12px;
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
        width: 98.6vw;

    }
</style>

<body>
    <!-- CABEÇALHO -->
    <div class="cabecalho">
        <picture>
            <source media="(max-width: 261px)" srcset='img/imgLogo/lyonSlzEscudo5.png' loading="lazy">

            <source media="(max-width: 269px)" srcset='img/imgLogo/lyonSlzEscudo4.png' loading="lazy">

            <source media="(max-width: 311px)" srcset='img/imgLogo/lyonSlzEscudo3.png' loading="lazy">

            <source media="(max-width: 375px)" srcset='img/imgLogo/lyonSlzEscudo2.png' loading="lazy">

            <img src="img/imgLogo/lyonSlzEscudo.png" alt="Escudo do time LYYON SLZ" loading="lazy">
        </picture>
        <nav class="navbar navbar-expand-lg mt-4">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php">HOME</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                CATEGORIAS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="subs/sub09.php">sub09</a></li>
                                <li><a class="dropdown-item" href="subs/sub11.php">sub11</a></li>
                                <li><a class="dropdown-item" href="subs/sub13.php">sub13</a></li>
                                <li><a class="dropdown-item" href="subs/sub15.php">sub15</a></li>
                                <li><a class="dropdown-item" href="subs/sub17.php">sub17</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PARTIDAS
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="calendario.php">CALENDÁRIO DE JOGOS</a></li>
                                <li><a class="dropdown-item" id="marcado" href="jogoDeHoje.php">JOGOS DE HOJE</a></li>
                                <li><a class="dropdown-item" href="campeonatosUser.php">CAMPEONATOS</a></li>
                                <li><a class="dropdown-item" href="historicoPartidas.php">HISTÓRICO DE PARTIDAS</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="ranking.php">RANKING</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="noticiais.php">NOTÍCIAS</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ÁREA RESTRITA
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="login.php">LOGAR</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <div class="container-fluid">
            <h1 id="calendarioDeJogos">JOGOS DE HOJE</h1>
            <hr>
            <br><br>
            <?php
            $data_Atual = date("Y-m-d");
            if (count($dados) > 0) {
                echo "<div class='table table-responsive table-striped'>";
                echo "<table class='table table-striped'>
                  <thead class=table-dark>
                  <tr>
              <th>JOGOS</th>
              <th>RESULTADO</th>
              <th>DATA</th>
              <th>HORÁRIO</th>
                  </tr>
                  </thead>";
                foreach ($dados as $chaves => $valor) {
                    $dataJogo = $valor['data_partida'];
                    if (strtotime($dataJogo) == strtotime($data_Atual)) {
                        echo "<tr>
                        <td><abbr title='" . $valor['nome_campeonato'] . "'>" . "LyonX" . $valor['adversario'] . "</abbr></td>
                  <td>" . $valor['gols_lyon'] . " x " . $valor['gols_adv'] . "</td>
                  <td>" . date("d/m/y", strtotime($valor['data_partida'])) . "</td>
                  <td>" . date("H:i", strtotime($valor['horario'])) . "</td>
                  
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

</html>