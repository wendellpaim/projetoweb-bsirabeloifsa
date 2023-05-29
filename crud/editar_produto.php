<?php
require '../conexao.php';

$sqlCategoria = "SELECT * FROM categoria";
$result = mysqli_query($conn, $sqlCategoria);
$categorias = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Verificar se o formulário foi enviado
if (isset($_POST['enviar'])) {
  $id_produto = $_POST['id'];
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $categoria = $_POST['id_categoria'];

  // Verificar se uma nova imagem foi enviada
  if ($_FILES['imagem']['name'] != '') {
    $imagem = $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], "../imagens/".$imagem);

    // Atualizar produto com nova imagem
    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', imagem='$imagem', id_categoria='$categoria' WHERE id_produto=$id_produto";
  } else {
    // Atualizar produto sem nova imagem
    $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', id_categoria='$categoria' WHERE id_produto=$id_produto";
  }

  if (mysqli_query($conn, $sql)) {
   
   /* echo '<script>
      alert("Produto editado com sucesso!");      
    </script>';
     header('Location: editar_produto.php');*/
  } else {
    //echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
   // header('Location: editar_produto.php');
  }
}

// Buscar produto pelo ID
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM produtos WHERE id_produto=$id";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $produto = mysqli_fetch_assoc($result);
  } else {
    echo "Produto não encontrado.";
  }
} else {
  echo "ID de produto não especificado.";
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Editar Produto</title>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</head>
<body>
  <?php require '../topo.php'; ?>

  <div class="container">
    <div class="row">
      <h2 class="mb-3 mt-3">Editar Produto</h2>

      <form id="editar-produto" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $produto['id_produto']; ?>">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $produto['nome']; ?>" required>
        </div>
        <div class="form-group">
          <label for="descricao">Descrição:</label>
          <input type="text" name="descricao" id="descricao" class="form-control" value="<?php echo $produto['descricao']; ?>" required>
        </div>
        <div class="form-group">
          <label for="preco">Preço:</label>
          <input type="text" name="preco" id="preco" class="form-control" value="<?php echo $produto['preco']; ?>" required>
        </div>
        <div class="form-group">
          <label for="imagem">Imagem:</label>
          <img src="../imagens/<?php echo $produto['imagem']; ?>" width="100"><br>
          <input type="file" name="imagem" id="imagem" class="form-control">
        </div>
        <div class="form-group">
          <label for="id_categoria">Categoria:</label>
          <input type="text" name="id_categoria" id="id_categoria" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" name="enviar" id="editar-produto-btn" class="btn btn-primary">Editar</button>
          <a href="logout.php"><button style="margin-top: 20px;" type="button" class="btn btn-danger botoes-adicionar-sair">Sair</button></a>
        </div>
      </form>      
    </div>
  </div>
  <?php require '../rodape.php'; ?>
</body>
</html>