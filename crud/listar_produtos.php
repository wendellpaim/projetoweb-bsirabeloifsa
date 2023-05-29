<?php
session_start();

//Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
}

require '../conexao.php';

// Consulta SQL para selecionar todos os produtos
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);
$produtos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <title>Lista de Produtos</title>      
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">      
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
    <?php require '../topo.php'; ?>

    <h2>Lista de Produtos</h2>

    <table>
        <thead>
            <tr>
                <th class="tabela-produtos">Nome</th>
                <th class="tabela-produtos">Descrição</th>
                <th class="tabela-produtos">Preço</th>
                <th class="tabela-produtos">Imagem</th>
                <th class="tabela-produtos">Categoria</th>
                <th class="tabela-produtos">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto) { ?>
                <tr style="borsder: 20px solid white" class="tabela-produtos">
                    <td class="tabela-produtos"><?= $produto['nome'] ?></td>
                    <td class="tabela-produtos"><?= $produto['descricao'] ?></td>
                    <td class="tabela-produtos"><?= $produto['preco'] ?></td>
                    <td class="tabela-produtos"><img src="../imagens/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>" style="width: 100px; height: 100px;"></td>
                    <td class="tabela-produtos"><?= $produto['id_categoria'] ?></td>
                    <td class="tabela-produtos">
                        <a href="editar_produto.php?id=<?= $produto['id_produto'] ?>"><button type="button" class="btn btn-warning botoes" style="margin-bottom: 10px;">Editar</button></a>
                        <a href="deletar_produto.php?id=<?= $produto['id_produto'] ?>"><button type="button" class="btn btn-danger botoes">Excluir</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="cadastrar_produto.php"><button type="button" class="btn btn-success botoes-adicionar-sair">Adicionar Produto</button></a>
    <a href="logout.php"><button type="button" class="btn btn-danger botoes-adicionar-sair">Sair</button></a>

    <?php require '../rodape.php'; ?>
</body>
</html>
