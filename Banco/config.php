<?php
$localhost = "localhost";
$usuario = "root";
$senha = "";
$banco = "teste";

// Criar uma conexão
$conexao = new mysqli($localhost, $usuario, $senha, $banco);
?>

<?php 
/*
// Verificar se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Conexão bem-sucedida
echo "Conexão estabelecida com sucesso!";
*/
?>
