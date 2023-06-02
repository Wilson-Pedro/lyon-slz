<?php
include('../user/db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tblpartidass");
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
    <link rel="stylesheet" href="../css/timeANDescudo.css">
    <link rel="stylesheet" href="../css/update-delete.css">
    <link rel="stylesheet" href="../css/navegacao.css">
    <link rel="stylesheet" href="../css/navResponsivo.css">
    <title>Histório de Partidas</title>
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
                        <a class="nav-link" href="#" id="marcado">PARTIDAS</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="calendarioAdmin.php">CALENDÁRIO DE JOGOS</a>
                                <a href="historicoPartidasAdmin.php" id="marcado">HISTÓRICO DE PARTIDAS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticiaisAdmin.php">NOTÍCIAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MAIS</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="cadastroDeJogador.php">Cadastrar Jogador</a>
                                <a href="cadastroDePartidas.php">Cadastrar partida</a>
                                <a href="../user/home.php">Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <main>
        <div class="container-fluid">
            <h1 id="calendarioDeJogos">HISTÓRICO DE PARTIDAS</h1>
            <hr>
            <!-- ATUALIZAR -->
            <form class="oculto" id="form_atualiza" method="post">
                <div id="div-update" class="oculto">
                    <h5>ID:</h5>
                    <input type="text" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>
                    <h5>Gols do Lyon:</h5>
                    <input type="number" id="gols_lyon_editado" name="gols_lyon_editado" placeholder="Editar time gols" required><br><br>
                    <h5>Gols do Adversário:</h5>
                    <input type="number" id="gols_adv_editado" name="gols_adv_editado" placeholder="Editar gols" required><br><br>
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
            if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['gols_lyon_editado']) && isset($_POST['gols_adv_editado'])) {
                $id = $_POST['id_editado'];
                $gols_lyon = $_POST['gols_lyon_editado'];
                $gols_adv = $_POST['gols_adv_editado'];
                $sql = $pdo->prepare("UPDATE tblpartidass SET gols_lyon = :gols_lyon, gols_adv = :gols_adv WHERE id= :id");
                $sql->bindValue(':gols_lyon', $gols_lyon);
                $sql->bindValue(':gols_adv', $gols_adv);
                $sql->bindValue(':id', $id);
                $sql->execute();
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
                $sql = $pdo->prepare("DELETE FROM tblpartidass WHERE id=? AND localidade=? AND timeb=? AND data_partida=?");
                $sql->execute(array($id, $localidade, $timeb, $data_partida));
            }
            ?>
            <?php
            $data_Atual = date("Y-m-d");
            if (count($dados) > 0) {
                echo "<table class='table table-striped'>
                  <thead class=table-dark>
                  <tr>
              <th>JOGOS</th>
              <th>RESULTADO</th>
              <th>DATA</th>
              <th>Editar</th>
                  </tr>
                  </thead>";
                foreach ($dados as $chaves => $valor) {
                    $dataJogo = $valor['data_partida'];
                    if (strtotime($dataJogo) <= strtotime($data_Atual)) {
                        echo "<tr>
                  <td>" . "Lyon X " . $valor['timeb'] . "</td>
                  <td>" . $valor['gols_lyon'] . " x " . $valor['gols_adv'] . "</td>
                  <td>" . date("d/m/y", strtotime($valor['data_partida'])) . "</td>
                  <td><a href='#' class='btn-atualizar' data-id='" . $valor['id'] . "' data-gols_lyon='" . $valor['gols_lyon'] . "'data-gols_adv='" . $valor['gols_adv'] . "'>Atualizar</a> | <a href='#' class='btn-deletar' data-id='" . $valor['id'] . "' data-localidade='" . $valor['localidade'] . "' data-timeb='" . $valor['timeb'] . "'data-data_partida='" . $valor['data_partida'] . "'>Deletar</a></td>
            </tr>";
                    }
                }
                echo "</table>";
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
<script>
    //      ATUALIZAR

    $(".btn-atualizar").click(function() {
        var id = $(this).attr('data-id');
        var gols_lyon = $(this).attr('data-gols_lyon');
        var gols_adv = $(this).attr('data-gols_adv');

        $('#form_salva').addClass('oculto');
        $('#form_deleta').addClass('oculto');
        $('#form_atualiza').removeClass('oculto');
        $('#div-update').removeClass('oculto');


        $("#id_editado").val(id);
        $("#gols_lyon_editado").val(gols_lyon);
        $("#gols_adv_editado").val(gols_adv);

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