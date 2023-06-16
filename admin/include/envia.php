<?php

require('../../db/conexao.php');

$data_atual = date('Y-m-d');

$pasta = "../imgArquivos";

if(!is_dir($pasta)){
    mkdir($pasta);
}

$dado = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$arquivo = $_FILES['arquivo'];

for ($cont = 0; $cont < count($arquivo['name']); $cont++) {

    $nome_arquivo = $arquivo['name'][$cont];
    $destino = "../imgArquivos/" . $arquivo['name'][$cont];
    if (move_uploaded_file($arquivo['tmp_name'][$cont], $destino)) {
        header('Location: ../fotosAdmin.php');
        $sql = $pdo->prepare("INSERT INTO tblfotoss VALUES (null,?)");
        $nome_arquivo = $arquivo['name'][$cont];
        $sql->execute(array($nome_arquivo));
    } else {
        header('Location: ../fotosAdmin.php');
    }
}

