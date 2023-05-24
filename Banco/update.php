<?php
require('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $senha = $_POST["novaSenha"];

  if (isset($_SESSION['email'])) {

    $email = $_SESSION['email'];

    $sql = "UPDATE cadastro SET senha = ? WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    
    // Bind dos valores dos parâmetros
    $stmt->bind_param("ss", $senha, $email);
    
    // Execute a consulta
    $stmt->execute();
  
    header("Location: ../confirmacao/confirmcadastrosenha.php");
 
  }
}
?>