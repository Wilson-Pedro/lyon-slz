<?php
// CONFIGURAÇÕES GERAIS
$servidor="localhost";
$usuario="root";
$senha="";
$banco="escolinha_de_futebol";
//ti1234

// CONEXÃO
try{
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erro){
    echo "Falha ao se conectar comm o banco ".$erro->getMessage();
}

date_default_timezone_set ("America/Sao_Paulo");

?>
<!-- $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); -->