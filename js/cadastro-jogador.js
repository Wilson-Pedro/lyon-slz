var cad_jogadorConfirmMsg = document.getElementById('cad-jogadorConfirmMsg');
var jogador = [
    document.getElementById('jogadorNome'),
    document.getElementById('jogadorIdade'),
    document.getElementById('jogadorPosicao'),
    document.getElementById('jogadorGols'),
    document.getElementById('jogadorFoto')
];
function validaCampos(event) {
    if (jogador[0].value == '' || jogador[1].value == '' || jogador[2].value == '' || jogador[3].value == '') {
        alert('Preencha todos os campos para cadastrar um jogador');
    }else if (typeof jogador[0].value === "number") {
        alert('Insira uma nome e sobrenomes válidos');

    } else if (!typeof jogador[1].value === "string" && !typeof jogador[1].value === "number") {
        alert('Insira uma idade válida');

    } else if (typeof jogador[2].value === "number") {
        alert('Insira uma posição válida');

    } else if (!typeof jogador[3].value === "number") {
        alert('Insira uma média de gols válido');

    } else {
        cad_jogadorConfirmMsg.showModal();
    }
    event.preventDefault();
    return;
}
function limpaCampos0() {
    jogador[0].value = '';
}
function limpaCampos1() {
    jogador[1].value = '';
}
function limpaCampos2() {
    jogador[2].value = '';
}
function limpaCampos3() {
    jogador[3].value = '';
}
function limpaCampos4() {
    jogador[4].value = '';
}