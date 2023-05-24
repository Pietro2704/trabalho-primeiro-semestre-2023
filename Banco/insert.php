<?php 
require('config.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $nome = $_POST["txtNome"];
  $email = $_POST["txtemail"];
  $cpf = $_POST["txtCPF"];
  $nasc = $_POST["txtDataNascimento"];
  $tel = $_POST["txtTelefone"];
  $cep = $_POST["txtCEP"];
  $senha = $_POST["txtSenha"];

  $_SESSION['nome'] = $nome;
  $_SESSION['email'] = $email;

  Cadastrar($conexao, $nome, $email, $cpf, $nasc, $tel, $cep, $senha);  
  header("Location: ../confirmacao/confirmarcadastro.php");
  exit();

}


function Cadastrar($conexao, $nome, $email, $cpf, $nasc, $tel, $cep, $senha){

  $sql = "INSERT INTO cadastro(nome, email, cpf, nascimento, tel, cep, senha) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conexao->prepare($sql);
  $stmt->bind_param("sssssss", $nome, $email, $cpf, $nasc, $tel, $cep, $senha);
  $stmt->execute();
  $stmt->close();

}

?>