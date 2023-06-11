<?php

require('../db/conexao.php');

$pasta = "imgNoticias";

if(!is_dir($pasta)){
    mkdir($pasta);
}

$dado = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (empty($_FILES['arquivo'])) {
    // O arquivo não foi enviado, trate o erro adequadamente
    echo "Nenhum arquivo selecionado.";
    exit;
}

$arquivo = $_FILES['arquivo'];

$nome_arquivo = $arquivo['name'];
$destino = "imgNoticias/" . $arquivo['name'];
if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
    header('Location: noticiaisAdmin.php');
    $sql = $pdo->prepare("INSERT INTO tblfotos_noticias VALUES (null, :nome_arquivo)");
    $sql->bindParam(':nome_arquivo', $nome_arquivo);
    $sql->execute();

} else {
    header('Location: noticiaisAdmin.php');
}
/*
require('../db/conexao.php');

$pasta = "imgArquivos";

if(!is_dir($pasta)){
    mkdir($pasta);
}

$dado = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (empty($_FILES['arquivo'])) {
    // O arquivo não foi enviado, trate o erro adequadamente
    echo "Nenhum arquivo selecionado.";
    exit;
}

$arquivo = $_FILES['arquivo']; // Adicione esta linha

$nome_arquivo = $arquivo['name'];
$destino = "imgArquivos/" . $arquivo['name'];
if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
    header('Location: noticiaisAdmin.php');
    $sql = $pdo->prepare("INSERT INTO tblfotos_noticias VALUES (null, :nome_arquivo)");
    $sql->bindParam(':nome_arquivo', $nome_arquivo);
    $sql->execute();

} else {
    header('Location: noticiaisAdmin.php');
}

*/
?>
