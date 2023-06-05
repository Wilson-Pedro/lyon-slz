<?php
session_start();

$servidor="localhost";
$usuario="root";
$senha="";
$banco="escolinha_de_futebol";

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

/*$servidor="localhost";
$usuario="root";
$senha="";
$banco="escolinha_de_futebol";

$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

if($mysqli->error){
    die("Falha ao conectar no banco de dados: ". $mysqli->error);
}

if (isset($_POST['nameLog']) || isset($_POST['senhaLog'])) {
    if (strlen($_POST['nameLog']) == 0 || strlen($_POST['senhaLog']) == 0) {
        echo "<script>alert('Preencha os campos corretamente')</script>";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nameLog']);
        $senha = $mysqli->real_escape_string($_POST['senhaLog']);

        $sql_code = "SELECT * FROM tblloginn WHERE usuario = '$nome' LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }
            if(password_verify($senha, $usuario['senha'])){
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['usuario'] = $usuario['usuario'];

                header("Location: admin/homeAdmin.php");
            }
        }else{
            // SERIALIZA A STRING INVALID PARA RETORNAR NO FORM DE HTML
            $invalid = "Ops... e-mail ou senha incorretos!";
        }

        //

        // if (password_verify($senha, $usuario['senha'])) {
        //     echo "<script type='text/javascript'> window.location = 'admin/homeAdmin.php' </script>";
        // } else {
        //     echo "<script> alert('Nome ou Senha estão errados.') </script>";
        //     echo "<script type='text/javascript'> window.location = 'login.php' </script>";
        // }
    }
}
*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
</head>
<style>
    body {
        background: linear-gradient(90deg, rgba(255, 136, 0, 0.8), rgba(122, 71, 12, 0.445) 90%);
        width: 90%;
        height: 90%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: bold;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login {
        padding: 5%;
        /* padding-bottom: 60vh; */
        background-color: white;
        display: block;
        margin: auto;
        margin-top: 7%;

        /*width: fit-content;
        height: fit-content;*/
        text-align: center;
        border-radius: 2vh;
        box-shadow: 2px 1px 6px black;
    }

    input#senhaLog {
        width: 100%;
    }

    .hidden {
        display: none;
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
            <div>
                <span class="senha">
                    <input type="password" name="senhaLog" id="senhaLog" class="senha">
                </span>
                <span class="olho" id="olho"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z">
                        </path>
                    </svg>
                </span>
            </div>
            <br>
            <div>
                <button id='submeter' class='hidden' type="submit" name="entrar"></button>
            </div><br>
            <a href="admin/index.php"></a>
        </form>
        <button class="btn-entrar" onclick="validaCampos()">Entrar</button>
        <input type="button" value="Limpar" class="btn-entrar" onclick="limpaCampos()">

        <!-- <div>
            <a href="cadastro.php"><input type="button" value="Cadastrar uma conta" class="btn-cadastrar"></a>
        </div> -->
    </div>
</body>

</html>
<script>
    var emailLog = document.getElementById('emailLog');
    var senhaLog = document.getElementById('senhaLog');
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
            document.getElementById('submeter').click();
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