var emailLog = document.getElementById('emailLog');
var senhaLog = document.getElementById('senhaLog');
var entrar = document.getElementById('entrar');
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
        entrar.type = "submit";
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

olho.mousedown(function() {
    senha.attr("type", "text");
});

olho.mouseup(function() {
    senha.attr("type", "password");
});

// $("#olho").mouseout(function () {
//     $("#senhaLog").attr("type", "password");
// });
const eye = document.getElementById('olho');
eye.addEventListener("touchstart", function() {
    senha.attr("type", "text")
});

eye.addEventListener("touchend", function() {
    senha.attr("type", "password")
});

// function eye(){
//     $("#olho").addEventListener("touchleave", eye());
//     $("#senhaLog").attr("type", "password");
// };