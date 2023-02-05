var emailCad = document.getElementById('emailCad');
var emailCadConfirm = document.getElementById('emailCadConfirm');
var senhaCad = document.getElementById('senhaCad');
var senhaCadConfirm = document.getElementById('senhaCadConfirm');
var alerta = document.querySelector('div#aviso');
function validaCampos() {
    if (emailCad.value == "" && emailCadConfirm.value == "" && senhaCad.value == "" && senhaCadConfirm.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha todos os campos corretamente!</p>";
        emailCad.style.borderColor = "red";
        emailCadConfirm.style.borderColor = "red";
        senhaCad.style.borderColor = "red";
        senhaCadConfirm.style.borderColor = "red";
    } else if (emailCad.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha o campo Email corretamente!</p>";
        emailCad.style.borderColor = "red";
        emailCadConfirm.style.borderColor = "black";
        senhaCad.style.borderColor = "black";
        senhaCadConfirm.style.borderColor = "black";
        if (emailCad.value == "" && emailCadConfirm.value == "") {
            alerta.innerHTML = "<p class='msg'>Preencha os campos de Email e de Confirme o seu email!</p>";
            emailCad.style.borderColor = "red";
            emailCadConfirm.style.borderColor = "red";
            senhaCad.style.borderColor = "black";
            senhaCadConfirm.style.borderColor = "black";
        }
    } else if (emailCadConfirm.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha o campo Confirmação de Email corretamente!</p>";
        emailCad.style.borderColor = "black";
        emailCadConfirm.style.borderColor = "red";
        senhaCad.style.borderColor = "black";
        senhaCadConfirm.style.borderColor = "black";
    } else if (senhaCad.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha o campo Senha corretamente!</p>";
        emailCad.style.borderColor = "black";
        emailCadConfirm.style.borderColor = "black";
        senhaCad.style.borderColor = "red";
        senhaCadConfirm.style.borderColor = "black";
        if (senhaCad.value == "" && senhaCadConfirm.value == "") {
            alerta.innerHTML = "<p class='msg'>Preencha os campos de Senha e de Confirme a sua senha!</p>";
            emailCad.style.borderColor = "black";
            emailCadConfirm.style.borderColor = "black";
            senhaCad.style.borderColor = "red";
            senhaCadConfirm.style.borderColor = "red";
        }
    } else if (senhaCadConfirm.value == "") {
        alerta.innerHTML = "<p class='msg'>Preencha o campo Confirme sua senha corretamente!</p>";
        emailCad.style.borderColor = "black";
        emailCadConfirm.style.borderColor = "black";
        senhaCad.style.borderColor = "black";
        senhaCadConfirm.style.borderColor = "red";
    } else if (emailCad.value != emailCadConfirm.value && senhaCad.value != senhaCadConfirm.value) {
        alerta.innerHTML = "<p class='msg'>Insira a mesma Senha e o mesmo Email <br> nos campos de Confirmação de email e Confirmação de senha!</p>";
        emailCad.style.borderColor = "red";
        emailCadConfirm.style.borderColor = "red";
        senhaCad.style.borderColor = "red";
        senhaCadConfirm.style.borderColor = "red";
    } else if (emailCad.value != emailCadConfirm.value) {
        alerta.innerHTML = "<p class='msg'>Insira o mesmo Email nos dois campos!</p>";
        emailCad.style.borderColor = "red";
        emailCadConfirm.style.borderColor = "red";
        senhaCad.style.borderColor = "black";
        senhaCadConfirm.style.borderColor = "black";
    } else if (senhaCad.value != senhaCadConfirm.value) {
        alerta.innerHTML = "<p class='msg'>Insira a mesma Senha nos dois campos!</p>";
        emailCad.style.borderColor = "black";
        emailCadConfirm.style.borderColor = "black";
        senhaCad.style.borderColor = "red";
        senhaCadConfirm.style.borderColor = "red";
        return;
    } else {
        cadConfirmMsg.showModal();
        alerta.innerHTML = "";
        emailCad.style.borderColor = "black";
        emailCadConfirm.style.borderColor = "black";
        senhaCad.style.borderColor = "black";
        senhaCadConfirm.style.borderColor = "black";
    }
    return;
}
function limpaCampos() {
    emailCad.value = "";
    emailCadConfirm.value = "";
    senhaCad.value = "";
    senhaCadConfirm.value = "";
    alerta.innerHTML = "";
    emailCad.style.borderColor = "grey";
    emailCadConfirm.style.borderColor = "grey";
    senhaCad.style.borderColor = "grey";
    senhaCadConfirm.style.borderColor = "grey";
}

var senha = $('#senhaCad');
var olho = $("#olho");

olho.mousedown(function () {
    senha.attr("type", "text");
});

olho.mouseup(function () {
    senha.attr("type", "password");
});

$("#olho").mouseout(function () {
    $("#senhaCad").attr("type", "password");
});
var senhaConfirm = $('#senhaCadConfirm');
var olhoConfirm = $("#olhoConfirm");

olhoConfirm.mousedown(function () {
    senhaConfirm.attr("type", "text");
});

olhoConfirm.mouseup(function () {
    senhaConfirm.attr("type", "password");
});

$("#olhoConfirm").mouseout(function () {
    $("#senhaCadConfirm").attr("type", "password");
});