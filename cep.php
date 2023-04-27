<?php 
public function buscarCep(){
  $cep = $_GET['cep'];
  $url = "https://viacep.com.br/ws/{$cep}/json/";
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  $resultado = curl_exec($ch);
  $endereco = json_decode($resultado, true);
  
  if (isset($endereco['erro'])) {
      echo "CEP não encontrado";
  } else {
      $CEP =  $endereco['cep'];
      $Logradouro =  $endereco['logradouro'];
      $Complemento =  $endereco['complemento'];
      $Bairro =  $endereco['bairro'];
      $Cidade =  $endereco['localidade'];
      $Estado =  $endereco['uf'];
  }
}
?>