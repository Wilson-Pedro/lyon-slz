<?php

require('../html/db/conexao.php');

$data_atual = date('Y-m-d');

$pasta = "imgArquivos";

if(!is_dir($pasta)){
    mkdir($pasta);
}

$dado = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$arquivo = $_FILES['arquivo'];

for ($cont = 0; $cont < count($arquivo['name']); $cont++) {

    $nome_arquivo = $arquivo['name'][$cont];
    $destino = "imgArquivos/" . $arquivo['name'][$cont];
    if (move_uploaded_file($arquivo['tmp_name'][$cont], $destino)) {
        header('Location: fotosAdmin.php');
        $sql = $pdo->prepare("INSERT INTO tblfotoss VALUES (null,?)");
        $nome_arquivo = $arquivo['name'][$cont];
        $sql->execute(array($nome_arquivo));
    } else {
        header('Location: fotosAdmin.php');
    }
}

/*
if(isset($_FILES) && count($FILES) > 0){
    var_dump($_FILES);
    die();
}

$nomeDoArquivo = $_FILES['arquivo']['name'];
$caminhoAtualArquivo = $_FILES['arquivo']['tmp_name'];
$caminhoSalvar = '../img/imgArquivos/'.$nomeDoArquivo;

if(move_uploaded_file($caminhoAtualArquivo, $caminhoSalvar)){
    $sql = $pdo->prepare("INSERT INTO tblfotos VALUES (null,?,?)");
    $sql->execute(array($nomeDoArquivo, $data_atual));
    header('Location: fotos-admin.php');
}else {
    header('Location: fotos-admin.php');
}*/
