<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "escolinha_de_futebol";

$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve erro na conexão com o banco de dados
if ($mysqli->connect_error) {
    die("Falha ao conectar no banco de dados: " . $mysqli->connect_error);
}

if (isset($_POST['nameLog']) && isset($_POST['senhaLog'])) {
    if (empty($_POST['nameLog']) || empty($_POST['senhaLog'])) {
        echo "<script>alert('Preencha os campos corretamente')</script>";
    } else {
        $nome = $mysqli->real_escape_string($_POST['nameLog']);
        $senha = $mysqli->real_escape_string($_POST['senhaLog']);

        $sql_code = "SELECT * FROM tblloginn WHERE usuario = ? LIMIT 1";
        $stmt = $mysqli->prepare($sql_code);
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['usuario'] = $usuario['usuario'];
                header("Location: admin/homeAdmin.php");
                exit();
            }
        } else {
            $invalid = "Ops... e-mail ou senha incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<style>
    .login {
        padding: 5vh;
        background-color: white;
        margin: auto;
        width: fit-content;
        height: fit-content;
        margin-top: 5vh;
        text-align: center;
        border-radius: 2vh;
    }

    .email {
        border-radius: 5vh;
        width: 100%;
        height: 3vh;
        font-size: large;
    }

    .senha {
        border-radius: 5vh;
        width: 100%;
        height: 3vh;
        font-size: large;
    }

    .email:hover {
        box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
        border-color: gold;
    }

    .senha:hover {
        box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
        border-color: gold;
    }

    .logar {
        text-align: left;
    }

    .btn-entrar {
        border-radius: 5vh;
        width: fit-content;
        padding-left: 10vh;
        padding-right: 10vh;
        margin-top: 1vh;
        margin-bottom: 1vh;
        height: 5vh;
        border: transparent;
        background-color: rgba(255, 136, 0, 0.8);
        color: black;
        font-size: large;
        cursor: pointer;
    }

    .btn-cadastrar {
        border-radius: 5vh;
        width: fit-content;
        padding-left: 5vh;
        padding-right: 5vh;
        height: 5vh;
        border: transparent;
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        font-size: large;
        cursor: pointer;
    }

    .senha {
        width: 50vh;
    }

    .olho {
        margin-left: 2vh;
        cursor: pointer;
    }

    .campo-senha {
        display: flex;
        flex-direction: row;
    }

    #aviso {
        border-radius: 2vh;
        background-color: red;
        color: white;
        margin-bottom: -2vh;
    }

    .msg {
        padding: 2vh;
    }

    .lembrar:hover {
        border-color: gold;
    }

    .btn-entrar:hover {
        background: gold;
        box-shadow: 20vh;
        box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
    }

    .btn-cadastrar:hover {
        background: gold;
        box-shadow: 20vh;
        box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
    }

    .login:hover {
        box-shadow: 2vh 2vh 5vh rgba(0, 0, 0, 0.5);
    }

    body {
        background-image: linear-gradient(90deg, rgba(255, 136, 0, 0.8), rgba(134, 72, 0, 0.212) 90%), url("img/login/footbal-shoes-header-xcyp1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        font-family: Arial, Helvetica, sans-serif;
        font-size: larger;
        overflow-x: hidden;
        height: fit-content;
        padding: 1vh;
    }

    @media screen and (max-width: 600px) {
        .login {
            width: 35vh;
        }

        .login:hover {
            box-shadow: none;
        }

        .senha {
            width: 100%;
        }

        html {
            overflow: hidden;
        }

        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: -50vh;
            padding: 0;
        }
    }
</style>

<body>
    <div class="login">
        <h1>Login</h1>
        <div id="aviso">
        </div>
        <form method="post" action="">
            <p class="logar">Nome:</p>
            <div>
                <input type="text" name="nameLog" id="emailLog" class="email">
            </div><br>
            <p class="logar">Senha:</p>
            <div class="campo-senha">
                <span class="senha">
                    <input type="password" name="senhaLog" id="senhaLog" class="senha">
                </span>
                <span class="olho" id="olho"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                    </svg>
                </span>
            </div>
            <br>
            <div>
                <input type="button" id="entrar" name="entrar" class="btn-entrar" onclick="validaCampos()" value="Entrar">
                <input type="button" value="Limpar" class="btn-entrar" onclick="limpaCampos()">
            </div><br>
            <a href="../admin/index.php"></a>
        </form>
        <!-- <div>
            <a href="cadastro.php"><input type="button" value="Cadastrar uma conta" class="btn-cadastrar"></a>
        </div> -->
    </div>
</body>

</html>

<script>
    var emailLog = document.getElementById('emailLog');
    var senhaLog = document.getElementById('senhaLog');
    var entrar = document.getElementById('entrar');
    var alerta = document.querySelector('div#aviso');

    function validaCampos() {
        if (emailLog.value == "" && senhaLog.value == "") {
            alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
            emailLog.style.borderColor = "red";
            senhaLog.style.borderColor = "red";

        } else if (emailLog.value == "") {
            alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
            emailLog.style.borderColor = "red";

        } else if (senhaLog.value == "") {
            alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
            senhaLog.style.borderColor = "red";

        } else {
            alerta.innerHTML = "";
            emailLog.style.borderColor = "black";
            senhaLog.style.borderColor = "black";
            entrar.type = "submit";
        }

        return;
    }

    function limpaCampos() {
        emailLog.value = "";
        senhaLog.value = "";
        alerta.innerHTML = "";
        emailLog.style.borderColor = "grey";
        senhaLog.style.borderColor = "grey";
    }
    var senha = $('#senhaLog');
    var olho = $("#olho");

    olho.mousedown(function() {
        senha.attr("type", "text");
    });

    olho.mouseup(function() {
        senha.attr("type", "password");
    });

    // $("#olho").mouseout(function () {
    //     $("#senhaLog").attr("type", "password");
    // });
    const eye = document.getElementById('olho');
    eye.addEventListener("touchstart", function() {
        senha.attr("type", "text")
    });

    eye.addEventListener("touchend", function() {
        senha.attr("type", "password")
    });

    // function eye(){
    //     $("#olho").addEventListener("touchleave", eye());
    //     $("#senhaLog").attr("type", "password");
    // };
</script>