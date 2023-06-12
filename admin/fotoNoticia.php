<?php
require('db/conexao.php');

$sql = "SELECT * FROM tblfotos_noticias ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$pasta = "admin/imgNoticias/";
$nomeArquivo = "";

if ($resultado !== false) {
    $arquivo = $resultado['arquivo'];
    $nomeArquivo = $pasta . $arquivo;
} else {
    $nomeArquivo = "../img/imgTime/imgTime03.png";
}
?>

<img src="<?php echo $nomeArquivo; ?>" class="d-block w-100">