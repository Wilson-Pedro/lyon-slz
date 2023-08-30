<?php
//include('includes/verificacao.php');
?>
<?php
include('../db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tblcampeonato ORDER BY tblcampeonato.data_campeonato");
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
    <link rel="stylesheet" href="../css/timeANDescudo.css">
    <link rel="stylesheet" href="../css/update-delete.css">
    <title>Campeonatos</title>
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

    .id_oculto {
        display: none;
    }

    .atualizar {
        text-align: center;
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
                                <li><a class="dropdown-item" href="calendarioAdmin.php">CALENDÁRIO DE JOGOS</a></li>
                                <li><a class="dropdown-item" href="jogoDeHojeAdmin.php">JOGOS DE HOJE</a></li>

                                <li><a class="dropdown-item" id="marcado" href="campeonatosAdmin.php">CAMPEONATOS</a></li>

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
                                <li><a class="dropdown-item" href="cadastroDeNoticia.php"> CADASTRAR NOTÍCIA</a></li>
                                <li><a class="dropdown-item" href="../index.php">SAIR</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main>
        <div class="container-fluid">
            <h1 id="calendarioDeJogos">Campeonatos</h1>
            <hr>
            <!-- ATUALIZAR -->
            <form class="oculto" id="form_atualiza" method="post">
                <div id="div-update" class="oculto">
                    <h4 class="atualizar">ATUALIZAR</h4>
                    <input type="text" class="id_oculto" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>
                    <h5>Nome campeonato:</h5>
                    <input type="text" id="nome_c_editado" name="nome_c_editado" placeholder="Editar time gols" required><br><br>
                    <h5>Data Campeonato:</h5>
                    <input type="date" id="data_c_editado" name="data_c_editado" placeholder="Editar gols" required><br><br>
                    <button type="submit" name="atualizar" id="btn-atualizar">Atualizar</button>
                    <button type="button" id="cancelar" name="cancelar">Cancelar</button>
                    <hr>
                </div>
            </form>

            <br><br>
            <?php
            //PROCESSO DE ATUALIZAÇÃO
            if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['nome_c_editado']) && isset($_POST['data_c_editado'])) {
                $id_campeonato = $_POST['id_editado'];
                $nome_campeonato = $_POST['nome_c_editado'];
                $data_campeonato = $_POST['data_c_editado'];
                $sql = $pdo->prepare("UPDATE tblcampeonato SET nome_campeonato = :nome_campeonato, data_campeonato = :data_campeonato WHERE id_campeonato= :id_campeonato");
                $sql->bindValue(':nome_campeonato', $nome_campeonato);
                $sql->bindValue(':data_campeonato', $data_campeonato);
                $sql->bindValue(':id_campeonato', $id_campeonato);
                $sql->execute();
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
              <th>CAMPEONATO</th>
              <th>DATA</th>
              <th>Editar</th>
                  </tr>
                  </thead>";
                foreach ($dados as $chaves => $valor) {
                    $dataJogo = $valor['data_campeonato'];
                    if (strtotime($dataJogo) >= strtotime($data_Atual)) {
                        echo "<tr>
                  <td>" . $valor['nome_campeonato'] . "</td>
                  <td>" . date("d/m/y", strtotime($valor['data_campeonato'])) . "</td>
                  <td>
                  <a href='#' class='btn-atualizar' 
                  data-id='" . $valor['id_campeonato'] . "' 
                  data-nome-c='" . $valor['nome_campeonato'] . "'
                  data-data-c='" . $valor['data_campeonato'] . "'
                  >Atualizar</a></td>
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
        var nome_campeonato = $(this).attr('data-nome-c');
        var data_campeonato = $(this).attr('data-data-c');

        $('#form_salva').addClass('oculto');
        $('#form_deleta').addClass('oculto');
        $('#form_atualiza').removeClass('oculto');
        $('#div-update').removeClass('oculto');


        $("#id_editado").val(id);
        $("#nome_c_editado").val(nome_campeonato);
        $("#data_c_editado").val(data_campeonato);

    });

    //      OCULTAR

    $('#cancelar').click(function() {
        $('#form_atualiza').addClass('oculto');
        $('#div-update').addClass('oculto');
    });

    $('#cancelar_delete').click(function() {
        $('#form_atualiza').addClass('oculto');
    });
</script>

</html>