<?php
session_start();
require "../conexao.php"; //arquivo que contém a conexão com o banco de dados

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    //faz a consulta no banco de dados para verificar se as credenciais são válidas
    $query = "SELECT * FROM usuario WHERE nome='$nome' AND senha='$senha'";
    $result = mysqli_query($conn, $query);

    //verifica se encontrou algum registro na tabela de usuários
    if (mysqli_num_rows($result) == 1) {
        //usuário e senha válidos, define as informações do usuário na sessão e redireciona para a página desejada
        //$_SESSION['loggedin'] = true;
        $_SESSION['nome'] = $nome;
        header("Location: listar_produtos.php");
        exit;
    } else {
        //usuário ou senha inválidos, exibe uma mensagem de erro
        $error = "Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tela de Login</title> 
    <style>      
        .card-login {
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            border: none;            
            max-width: 400px;           
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .card-header-login {
            text-align: center;
            font-size: 24px;
            /* background-color: #F2F2F2; */
            border: none;
            font-weight: bold;
        }

        .card-body-login {
            padding: 20px;
        }

        .form-group-login {
            margin-bottom: 20px;
        }

        .botao-login {
            width: 100%;
        }

        .alerta-erro {
            text-align: center !important;
            margin-right: 20px;
            margin-left: 20px;
        }

        .link-cadastro {
            text-decoration: none;
            text-align: center;
            display: block;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    
</head>
<body>
    <div class="container">
        <div class="card card-login">
            <div class="card-header card-header-login">
                Login
            </div>
            <div class="card-body card-body-login">
                <form method="POST" action="login.php">
                    <div class="form-group form-group-login">
                        <label for="username">Usuário:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu usuário">
                    </div>
                    <div class="form-group form-group-login">
                        <label for="password">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha">
                    </div>
                    <button type="submit" class="btn btn-primary botao-login">Entrar</button>
                </form>
                <a class="link-cadastro" href="cadastrar.php">Cadastre-se</a>
            </div>            
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger alerta-erro"><?php echo $error; ?></div>
            <?php } ?>
           
        </div>
    </div>    
</body>
</html>
