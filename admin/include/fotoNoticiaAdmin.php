<?php
require('../db/conexao.php');

$sql = "SELECT * FROM tblfotos_noticias WHERE id = 19";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

$pasta = "imgNoticias/";
$nomeArquivo = "";

if ($resultado !== false) {
    $arquivo = $resultado['arquivo'];
    $nomeArquivo = $pasta . $arquivo;
} else {
    $nomeArquivo = "../img/imgTime/imgTime03.png";
}
?>

<img src="<?php echo $nomeArquivo; ?>" loading="lazy" class="d-block w-100">
