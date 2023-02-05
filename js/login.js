var emailLog = document.getElementById('emailLog');
var senhaLog = document.getElementById('senhaLog');
var alerta = document.querySelector('div#aviso');
function validaCampos() {
    if (emailLog.value == "" && senhaLog.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
        emailLog.style.borderColor = "red";
        senhaLog.style.borderColor = "red";
    } else if (emailLog.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
        emailLog.style.borderColor = "red";
    } else if (senhaLog.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
        senhaLog.style.borderColor = "red";
    } else {
        alerta.innerHTML = "";
        emailLog.style.borderColor = "black";
        senhaLog.style.borderColor = "black";
    }

    return;
}
function limpaCampos() {
    emailLog.value = "";
    senhaLog.value = "";
    alerta.innerHTML = "";
    emailLog.style.borderColor = "grey";
    senhaLog.style.borderColor = "grey";
}
var senha = $('#senhaLog');
var olho = $("#olho");

olho.mousedown(function () {
    senha.attr("type", "text");
});

olho.mouseup(function () {
    senha.attr("type", "password");
});

$("#olho").mouseout(function () {
    $("#senhaLog").attr("type", "password");
});