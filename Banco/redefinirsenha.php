<?php 
require('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $email = $_POST["txtEmail"];

  $sql = "SELECT * FROM cadastro WHERE email = ?";
  $stmt = $conexao->prepare($sql);

  // Bind dos valores dos parâmetros
  $stmt->bind_param("s", $email);

  // Execute a consulta
  $stmt->execute();

  // Obtenha o resultado da consulta
  $resultado = $stmt->get_result();

  if ($resultado && $resultado->num_rows > 0) {

    $_SESSION['email'] = $email; // Armazena o email na sessão
    header("Location: ../UPDATE/cadastronovasenha.html");
    exit(); // Encerra o script para garantir que a página seja redirecionada corretamente
  } 
  else {
    
    echo "Email <strong>NÃO</strong> existe";
  }
}
?>