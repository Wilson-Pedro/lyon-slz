var cad_partidaConfirmMsg = document.getElementById('cad-partidaConfirmMsg');
var cad_partidaConfirmMsgErro = document.getElementById('cad-partidaConfirmMsgErro');
var partida = [
    document.getElementById('partidaLocal'),
    document.getElementById('partidaTimeB'),
    document.getElementById('partidaHorarioData')
];
// VALIDAÇÃO DOS CAMPOS DO CAD. DE PARTIDA
function validaCampos(event) {
    if (partida[0].value == '' || partida[1].value == '' || partida[2].value == '') {
        alert('Preencha todos os campos para cadastrar uma partida');
    }
    //  else if (typeof partida[0].value === "number") {
    //     alert('Insira um local válido');
    // } else if (typeof partida[1].value === "number") {
    //     alert('Insira um nome do Time A válido');
    // } else if (typeof partida[2].value === "number") {
    //     alert('Insira um nome do Time B válido');
    // } else if (!typeof partida[3].value === "string" && !typeof partida[3].value === "number") {
    //     alert('Insira uma data e horário válidos');
    // } 
    else {
        // mostra a janela de confirmaçao confirmando o cadastro.
        cad_partidaConfirmMsg.showModal();
    }
    // evita do browser recarregar a página sempre que um alert fechar. 
    event.preventDefault();
    return;
}
// FECHA A JANELA DE CONFIRMAÇÃO DE ERRO DE CAD.
cancel.addEventListener('click', function () {
    cad_partidaConfirmMsgErro.close();
});
// LIMPA CADA CAMPO
function limpaCampos0() {
    partida[0].value = '';
}
function limpaCampos2() {
    partida[2].value = '';
}
function limpaCampos3() {
    partida[3].value = '';
}