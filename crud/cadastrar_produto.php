<?php
session_start();
require '../conexao.php';

//Verificar se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
}

if (isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    //$imagem = $_FILES['imagem'];
    $imagem = $_FILES['imagem']['name']; 
    $categoria = $_POST['categoria'];

    
   /* // Define as novas dimensões da imagem
    $novaLargura = 600;
    $novaAltura = 600;
    $pastaPrimeira = "../imagens/";
    // Obtém as dimensões da imagem original
    list($largura, $altura) = getimagesize($pastaTemporaria);

    // Cria uma nova imagem com as dimensões desejadas
    $novaImagem = imagecreatetruecolor($novaLargura, $novaAltura);

    // Carrega a imagem original
    if($tipoImagem === IMAGETYPE_JPEG) {
        $imagemOriginal = imagecreatefromjpeg($pastaTemporaria);
    } elseif($tipoImagem === IMAGETYPE_PNG) {
        $imagemOriginal = imagecreatefrompng($pastaTemporaria);
    } 
  
    // Redimensiona a imagem original para a nova imagem
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);

    // Salva a nova imagem com o mesmo nome da imagem original
    if($tipoImagem === IMAGETYPE_JPEG) {
        imagejpeg($novaImagem, $pastaPrimeira);
    } elseif($tipoImagem === IMAGETYPE_PNG) {
        imagepng($novaImagem, $pastaPrimeira);
    }
    //imagejpeg($novaImagem, $pasta, 100);

    // Libera a memória usada pela imagem original e pela nova imagem
    imagedestroy($imagemOriginal);
    imagedestroy($novaImagem);*/

    
    $pastaTemporaria = $_FILES['imagem']['tmp_name'];    
       
    if(getimagesize($pastaTemporaria) !== false) {
        $pasta = "../imagens/" . $_FILES['imagem']['name'];
        
        move_uploaded_file($pastaTemporaria, $pasta);
    }
    

    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem, id_categoria)
            VALUES ('$nome', '$descricao', '$preco', '$imagem', '$categoria')";

    if (mysqli_query($conn, $sql)) {
        header('Location: cadastrar_produto.php?sucesso');    
    } else {
        //echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
        header('Location: cadastrar_produto.php?erro');
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <title>Adicionar Produto</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
</head>
<body>
    <?php require '../topo.php'; ?>

    <div class="container">
        <div class="row">
            <h2 class="mb-3 mt-3">Adicionar Produto</h2>
            
            <form id="cadastra-produto" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao" id="descricao" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="text" name="preco" id="preco" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem:</label>
                    <input type="file" name="imagem" id="imagem" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" required>
                </div>
                <button type="submit" name="enviar" class="btn btn-primary">Adicionar</button>
                <a href="logout.php"><button style="margin-top: 20px;" type="button" class="btn btn-danger botoes-adicionar-sair">Sair</button></a>
            </form>
            <?php if (isset($_GET['sucesso'])) { ?>
                <div class="mensagem-sucesso">Produto cadastrado com sucesso!</div>
            <?php } ?>     
            <?php if (isset($_GET['erro'])) { ?>
                <div class="mensagem-erro">Erro ao cadastrar o produto!</div>
            <?php } ?>     
        </div>
    </div>    
    <?php require '../rodape.php'; ?>
</body>
</html>