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
    
    // Obtém o ID do último registro
    $sql_last_id = $pdo->prepare("SELECT MAX(id) as last_id FROM tblfotos_noticias");
    $sql_last_id->execute();
    $last_id_result = $sql_last_id->fetch(PDO::FETCH_ASSOC);
    $last_id = $last_id_result['last_id'];

    // Atualiza o arquivo do último registro
    $sql_update = $pdo->prepare("UPDATE tblfotos_noticias SET arquivo = :nome_arquivo WHERE id = :last_id");
    $sql_update->bindParam(':nome_arquivo', $nome_arquivo);
    $sql_update->bindParam(':last_id', $last_id);
    $sql_update->execute();

} else {
    header('Location: noticiaisAdmin.php');
}
