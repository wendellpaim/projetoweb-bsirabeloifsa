<?php
// Inicia a sessão
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $username = $_POST['username'];
    $senha = $_POST['senha']; 

    // Conecta ao banco de dados
    require "../conexao.php";
    

    // Verifica se já existe um usuário com o mesmo nome de usuário ou e-mail
    $query = "SELECT * FROM usuario WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $query);
   
    if (mysqli_num_rows($result) > 0) {
        // Usuário ou e-mail já cadastrado, exibe mensagem de erro
        $error = "Nome de usuário ou e-mail já cadastrados.";
    } else {
        
        // Insere o usuário no banco de dados
        $query = "INSERT INTO usuario (nome, telefone, email, data_nascimento, cep, endereco, username, senha) VALUES ('$nome', '$telefone', '$email', '$data_nascimento', '$cep', '$endereco', '$username', '$senha')";
        
        $result2 = mysqli_query($conn, $query);
       
        if ($result2) {           
            // Usuário cadastrado com sucesso, define as informações do usuário na sessão e redireciona para a página desejada
            $_SESSION['nome_usuario'] = $username;
            $_SESSION['loggedin'] = true;
            echo  "
            <script>
                alert('Usuário cadastrado com sucesso, você será redirecionado para a tela de login!');
                document.location.href = 'listar_produtos.php';
            </script>
            ";            
            exit;
        } else {
            // Ocorreu um erro ao cadastrar o usuário, exibe mensagem de erro
            $error = "Ocorreu um erro ao cadastrar o usuário. Por favor, tente novamente.";
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
}
?>