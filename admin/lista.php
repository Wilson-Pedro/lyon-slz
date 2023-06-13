<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<?php
/*

$pasta = "../img/imgArquivos/";
$diretorio = dir($pasta);


while($arquivo = $diretorio->read()) {
    if($arquivo != '.' && $arquivo != '..'){
        echo "<img src='".$pasta.$arquivo."' class='img-fluid'><br>";
    }
}*/
require('db/conexao.php');

$pasta = "admin/imgArquivos/";
$sql = $pdo->prepare("SELECT * FROM tblfotoss");
$sql->execute();
$dados = $sql->fetchAll();
//. $pasta . $valor['arquivo'] .
if (count($dados) > 0) {
    foreach ($dados as $chaves => $valor) { 
        echo "<img src='". $pasta . $valor['arquivo'] . "' loading='lazy' class='img-fluid img-thumbnail mt-3'><br>";
    }
} else {
    echo "<br><br><br><p class='mt-4' style='text-align:center'>Nenhuma foto foi postada.</p>";
}

?>