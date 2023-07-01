<?php
include('include/verificacao.php');
?>
<?php
include('../db/conexao.php');

$sql = $pdo->prepare("SELECT tblpartidass.*, tblcampeonato.nome_campeonato
FROM tblpartidass
JOIN tblcampeonato ON tblpartidass.id_campeonato = tblcampeonato.id_campeonato
ORDER BY tblpartidass.data_partida");
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
        width: 100%;
    }

    td,
    th {
        padding: 2px;
        text-align: center;
        border: solid 1px black;
        font-size: 70%;
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

    .deletar-jogador {
        background-color: red;
    }

    .deletar-jogador:hover {
        background-color: rgb(158, 3, 3);
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
                                <li><a class="dropdown-item" href="campeonatosAdmin.php">CAMPEONATOS</a></li>
                                <li><a class="dropdown-item" id="marcado" href="historicoPartidasAdmin.php">HISTÓRICO DE PARTIDAS</a></li>
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
            <h1 id="calendarioDeJogos">HISTÓRICO DE PARTIDAS</h1>
            <hr>
            <!-- ATUALIZAR -->
            <form class="oculto" id="form_atualiza" method="post">
                <div id="div-update" class="oculto">
                    <h4 class="atualizar">ATUALIZAR</h4>
                    <input type="text" class="id_oculto" id="id_editado" name="id_editado" placeholder="ID" required> <br><br>
                    <h5>Gols do Lyon:</h5>
                    <input type="number" id="gols_lyon_editado" name="gols_lyon_editado" placeholder="Editar time gols" required><br><br>
                    <h5>Gols do Adversário:</h5>
                    <input type="number" id="gols_adv_editado" name="gols_adv_editado" placeholder="Editar time gols" required><br><br>
                    <h5>Local:</h5>
                    <input type="text" id="localidade_editado" name="localidade_editado" placeholder="Editar local" required> <br><br>
                    <h5>Time B:</h5>
                    <input type="text" id="timeb_editado" name="timeb_editado" placeholder="Editar time B" required><br><br>
                    <h5>Data:</h5>
                    <input type="date" id="data_partida_editado" name="data_partida_editado" placeholder="Editar Data" required><br><br>
                    <h5>Horário:</h5>
                    <input type="time" id="horario_editado" name="horario_editado" placeholder="Editar horário" required><br><br>
                    <h5>Link das fotos:</h5>
                    <input type="text" id="link_fotos_editado" name="link_fotos_editado" placeholder="Editar gols" required><br><br>
                    <hr>
                    <button type="submit" name="atualizar" id="btn-atualizar">Atualizar</button>
                    <button type="button" class='deletar-jogador' id='btn-deletar-jogador'>Deletar</button>
                    <button type="button" id="cancelar" name="cancelar">Cancelar</button>
                    <hr>
                </div>
            </form>
            <!-- DELETAR -->
            <form class="oculto" id="form_deleta" method="post">
                <div id="div-delete" class="oculto">
                    <input type="hidden" class="id_oculto" id="id_deleta" name="id_deleta" placeholder="ID" required> <br><br>
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
            if (isset($_POST['atualizar']) && isset($_POST['id_editado']) && isset($_POST['gols_lyon_editado']) && isset($_POST['gols_adv_editado']) && isset($_POST['link_fotos_editado']) && isset($_POST['localidade_editado']) && isset($_POST['timeb_editado']) && isset($_POST['data_partida_editado']) && isset($_POST['horario_editado'])) {
                $id = $_POST['id_editado'];
                $gols_lyon = $_POST['gols_lyon_editado'];
                $gols_adv = $_POST['gols_adv_editado'];
                $link_fotos = $_POST['link_fotos_editado'];
                $localidade = $_POST['localidade_editado'];
                $timeb = $_POST['timeb_editado'];
                $data_partida = $_POST['data_partida_editado'];
                $horario = $_POST['horario_editado'];
                $sql = $pdo->prepare("UPDATE tblpartidass SET gols_lyon = :gols_lyon, gols_adv = :gols_adv, link_fotos = :link_fotos, localidade = :localidade, adversario = :adversario, data_partida = :data_partida, horario = :horario WHERE id= :id");
                $sql->bindValue(':gols_lyon', $gols_lyon);
                $sql->bindValue(':gols_adv', $gols_adv);
                $sql->bindValue(':link_fotos', $link_fotos);
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
              <th>RESULTADO</th>
              <th>DATA</th>
              <th>FOTOS</th>
              <th>Editar</th>
                  </tr>
                  </thead>";
                foreach ($dados as $chaves => $valor) {
                    $dataJogo = $valor['data_partida'];
                    if (strtotime($dataJogo) <= strtotime($data_Atual)) {
                        echo "<tr>
                            <td><abbr title='" . $valor['nome_campeonato'] . "'>" . "LyonX" . $valor['adversario'] . "</abbr></td>
                            <td>" . $valor['gols_lyon'] . " x " . $valor['gols_adv'] . "</td>
                            <td>" . date("d/m/y", strtotime($valor['data_partida'])) . "</td>
                            <td> 
                                <abbr class='abreviacao' title='Não há link para fotos'>
                                    <a class='link_foto' 
                                    style='color:red' 
                                    href='" . $valor['link_fotos'] . "' 
                                    target='_blank'
                                    >fotos</a> 
                                </abbr>
                            </td>
                            <td><a href='#' class='btn-atualizar' 
                            data-id='" . $valor['id'] . "' 
                            data-link_fotos='" . $valor['link_fotos'] . "'
                            data-gols_lyon='" . $valor['gols_lyon'] . "'
                            data-gols_adv='" . $valor['gols_adv'] . "'
                            data-localidade='" . $valor['localidade'] . "'
                            data-timeb='" . $valor['adversario'] . "'
                            data-data_partida='" . $valor['data_partida'] . "'
                            data-horario='" . date("H:i", strtotime($valor['horario'])) . "'
                            >Editar</a></tr>";
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
        var gols_lyon = $(this).attr('data-gols_lyon');
        var gols_adv = $(this).attr('data-gols_adv');
        var link_fotos = $(this).attr('data-link_fotos');
        var localidade = $(this).attr('data-localidade');
        var timeb = $(this).attr('data-timeb');
        var data_partida = $(this).attr('data-data_partida');
        var horario = $(this).attr('data-horario');

        $('#form_salva').addClass('oculto');
        $('#form_deleta').addClass('oculto');
        $('#form_atualiza').removeClass('oculto');
        $('#div-update').removeClass('oculto');


        $("#id_editado").val(id);
        $("#gols_lyon_editado").val(gols_lyon);
        $("#gols_adv_editado").val(gols_adv);
        $("#link_fotos_editado").val(link_fotos);
        $("#localidade_editado").val(localidade);
        $("#timeb_editado").val(timeb);
        $("#data_partida_editado").val(data_partida);
        $("#horario_editado").val(horario)

        $("#id_deleta").val(id);
        $("#localidade_deleta").val(localidade);
        $("#timeb_deleta").val(timeb);
        $("#data_partida_deleta").val(data_partida);

    });

    //      DELETAR

    $("#btn-deletar-jogador").click(function() {

        $('#form_atualiza').addClass('oculto');
        $('#div-update').addClass('oculto');
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

    $(document).ready(function() {
        var link_fotos = document.getElementsByClassName('link_foto');
        var abreviacao = document.getElementsByClassName('abreviacao');
        for (var i = 0; i < link_fotos.length; i++) {
            var href = link_fotos[i].getAttribute('href');
            if (href !== '') {
                link_fotos[i].style.color = 'blue';
                abreviacao[i].title = '';
            }
        }
    });
</script>

</html>