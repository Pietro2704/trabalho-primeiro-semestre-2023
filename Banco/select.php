<?php
require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $lembrar = isset($_POST["lembrar"]) ? $_POST["lembrar"] : "";

    function Verificacao($conexao, $email, $senha){
      // Use a variável de conexão '$conexao' obtida do arquivo config.php para executar consultas ao banco de dados
      // Certifique-se de que a tabela no banco de dados corresponda às colunas 'email' e 'senha'

      // Prepare a consulta SQL com parâmetros marcados com pontos de interrogação
      $sql = "SELECT * FROM cadastro WHERE email = ? AND senha = ?";
      $stmt = $conexao->prepare($sql);

      // Bind dos valores dos parâmetros
      $stmt->bind_param("ss", $email, $senha);

      // Execute a consulta
      $stmt->execute();

      // Obtenha o resultado da consulta
      $resultado = $stmt->get_result();

      if ($resultado && $resultado->num_rows > 0) {
          echo "As credenciais existem no banco de dados";
      } else {
          echo "As credenciais <strong>NÃO</strong> existem no banco de dados";
      }
  }

    Verificacao($conexao, $email, $senha);

}




?>
