

function buscarCep(cep) {
  // Monta a URL da API do ViaCEP
  var url = `https://viacep.com.br/ws/${cep}/json/`;

  // Faz uma requisição GET para a API do ViaCEP
  fetch(url)
    .then(response => response.json())
    .then(data => {
      // Preenche os campos do formulário com os dados do endereço
      document.getElementById("txtComplemento").value = data.logradouro;
      document.getElementById("txtBairro").value = data.bairro;
      document.getElementById("txtCidade").value = data.localidade;
      //document.getElementById("estado").value = data.uf;
    })
    .catch(error => {
      console.error(error);
    });
}

// Adiciona um listener para o evento "blur" do campo de CEP
document.getElementById("txtCEP").addEventListener("blur", function() {
  var cep = this.value.replace(/\D/g, ""); // Remove os caracteres não numéricos do CEP
  buscarCep(cep);
});

