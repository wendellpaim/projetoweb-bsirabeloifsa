<?php
require '../conexao.php';

// Verifica se foi passado um id válido pela URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Tenta deletar o produto com o id informado
    $sql = "DELETE FROM produtos WHERE id_produto = $id";
    if(mysqli_query($conn, $sql)) {
        echo "
        <script>
            alert('Produto deletado com sucesso') 
            document.location.href = 'listar_produtos.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Erro ao deletar produto') 
            document.location.href = 'listar_produtos.php'
        </script>;
        ";
    }
} else {
    echo "Produto inválido.";
}
?>
