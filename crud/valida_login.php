<?php
session_start();
require "../conexao.php"; //arquivo que contém a conexão com o banco de dados

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    //faz a consulta no banco de dados para verificar se as credenciais são válidas
    $query = "SELECT * FROM usuario WHERE nome='$nome' AND senha='$senha'";
    $result = mysqli_query($conn, $query);

    //verifica se encontrou algum registro na tabela de usuários
    if (mysqli_num_rows($result) == 1) {
        //usuário e senha válidos, define as informações do usuário na sessão e redireciona para a página desejada
        $_SESSION['loggedin'] = true;
        $_SESSION['nome'] = $nome;
        header("Location: listar_produtos.php");
        exit;
    } else {
        //usuário ou senha inválidos, exibe uma mensagem de erro
        $error = "Usuário ou senha inválidos.";
    }
}
?>