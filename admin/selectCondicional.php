<!DOCTYPE html>
<html>
<head>
  <title>Seleção condicional</title>
</head>
<body>
  <h2>Selecione um valor:</h2>
  <select id="select1" onchange="atualizarSegundoSelect()">
    <option value="todos">Todos</option>
    <option value="impar">Ímpar</option>
    <option value="par">Par</option>
    <option value='Futsal'>Futsal</option>
    <option value='Futebol'>Futebol</option>
  </select>
  
  <h2>Selecione um número:</h2>
  <select id="select2">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
  </select>

  <script>
    function atualizarSegundoSelect() {
      var primeiroSelect = document.getElementById("select1");
      var segundoSelect = document.getElementById("select2");
      var opcaoSelecionada = primeiroSelect.value;

      // Limpar as opções do segundo select
      segundoSelect.innerHTML = "";

      // Adicionar as opções de acordo com a seleção no primeiro select
      if (opcaoSelecionada === "impar") {
        for (var i = 1; i <= 6; i += 2) {
          var option = document.createElement("option");
          option.text = i;
          option.value = i;
          segundoSelect.add(option);
        }
      } else if (opcaoSelecionada === "par") {
        for (var i = 2; i <= 6; i += 2) {
          var option = document.createElement("option");
          option.text = i;
          option.value = i;
          segundoSelect.add(option);
        }
      } else {
        // Caso a opção selecionada seja "todos", adicionar todas as opções
        for (var i = 1; i <= 6; i++) {
          var option = document.createElement("option");
          option.text = i;
          option.value = i;
          segundoSelect.add(option);
        }
      }
    }
  </script>
</body>
</html>
