<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<form method="post" class="oculto"  id="form_img_deleta">
    <hr>
    <h4>Tem certeza que quer deletar a foto?</h4>

        <input type="hidden" id="id_deleta" name="id_deleta">

        <input type="hidden" id="arquivo_deleta" name="arquivo_deleta">
        
        <button type="submit" id="btn-deletar" name="deletar_foto">Confirmar</button>

        <button type="button" id="cancelar_delete" name="cancelar_delete">Cancelar</button>

</form>
<?php
if (isset($_POST['deletar_foto']) && isset($_POST['id_deleta']) && isset($_POST['arquivo_deleta'])) {

    $id = $_POST['id_deleta'];
    $arquivo = $_POST['arquivo_deleta'];

    $sql = $pdo->prepare("DELETE FROM tblfotoss WHERE id=? AND arquivo=?");

    $sql->execute(array($id, $arquivo));

    unlink("imgArquivos/" . $arquivo);

    //echo "<script type='text/javascript'> window.location = 'fotos-admin.php' </script>";
}
?>
<?php
/*

$pasta = "../img/imgArquivos/";
$diretorio = dir($pasta);


while($arquivo = $diretorio->read()) {
    if($arquivo != '.' && $arquivo != '..'){
        echo "<img src='".$pasta.$arquivo."' class='img-fluid'><br>";
    }
}*/
require('../db/conexao.php');

$pasta = "imgArquivos";

if(!is_dir($pasta)){
    mkdir($pasta);
}

$pasta = "imgArquivos/";

$sql = $pdo->prepare("SELECT * FROM tblfotoss");
$sql->execute();
$dados = $sql->fetchAll();

if (count($dados) > 0) {
    $vetor = 0;
    foreach ($dados as $chaves => $valor) {
        echo "<img name='imagem' src='" . $pasta . $valor['arquivo'] . "' class='img-fluid img-thumbnail mt-3'><br>";
        echo "<button class='btn-deletar' data-id='" . $valor['id'] . "' data-arquivo='" . $valor['arquivo'] . "'><a href='#form_img_deleta' class='ancora'>Deletar Foto</a></button>";
        echo "<br>";
    }
} else {
    echo "<br><br><br><p class='mt-4' style='text-align:center'>Nenhuma foto foi postada.</p>";
}

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".btn-deletar").click(function() {
        var id = $(this).attr('data-id');
        var arquivo = $(this).attr('data-arquivo');

        $("#id_deleta").val(id);
        $("#arquivo_deleta").val(arquivo);

        $('#form_img_deleta').removeClass('oculto');
    });

    $('#cancelar_delete').click(function() {
        $('#form_img_deleta').addClass('oculto');
    });
</script>