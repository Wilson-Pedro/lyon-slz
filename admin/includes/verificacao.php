<?php 
    session_start();

    if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
        echo "<a href='../home.php' id='voltar'></a>";
        echo "<script>";
            echo "var voltar = document.getElementById('voltar');";
            echo "voltar.click();";
        echo "</script>";
    }
?>