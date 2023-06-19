<?php
require('../db/conexao.php');

$sql = $pdo->prepare("SELECT * FROM tblnoticias WHERE id = 1");
$sql->execute();
$resultado = $sql->fetch(PDO::FETCH_ASSOC);
$titlo = $resultado['titulo'];
$descricao = $resultado['descricao']

?>

<div class="col-lg-4">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo $titlo; ?>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p class="description"><?php echo $descricao; ?></p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Sobre o Técnico.
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>O técnico do time da escolinha de futebol é um profissional dedicado e experiente. Ele está sempre presente nos treinos e jogos, orientando os jogadores e ensinando novas habilidades. Ele é um líder inspirador que motiva o time a dar o melhor de si em campo, mesmo quando as coisas estão difíceis. </p>
                    <p>Além disso, ele é respeitado e querido pelos jogadores, criando um ambiente de confiança e respeito mútuo. Seu objetivo é formar atletas completos e ensinar valores importantes, como trabalho em equipe, respeito e disciplina. </p>
                    <p>Em resumo, o técnico do time da escolinha de futebol é um profissional incrível que ajuda a moldar jovens jogadores de futebol e prepará-los para uma vida de sucesso dentro e fora do campo.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto mt-4">
        <a href="fotosAdmin.php" class="btn btn-warning mt-2" id="btn-fotos" type="button">Ver Fotos</a> 
    </div>

</div>