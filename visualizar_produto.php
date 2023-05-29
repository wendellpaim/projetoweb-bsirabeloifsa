<?php
require 'conexao.php';

$sqlCategoria = "SELECT * FROM categoria";
$result = mysqli_query($conn, $sqlCategoria);
$categorias = mysqli_fetch_all($result, MYSQLI_ASSOC);



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
  <title><?php echo $produto['nome']; ?></title>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"> 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
  <?php require 'topo.php'; ?>

  <div class="container">
    <div class="row">

      
        <div class="form-group">
        <br>
        <br>
          <h3> <?php echo $produto['nome']; ?> </h3>
        </div>
        <div class="imagem">
          <img src="imagens/<?php echo $produto['imagem']; ?>" width="400"><br>
        </div>
        <div class="descricao">
          <h6 for="descricao">Descrição:</h6>
          <p><?php echo $produto['descricao']; ?>"</p>
        </div>
        <div class="preco">
          <label for="preco">Preço:</label>
          <h4><?php echo 'R$ '. $produto['preco']; ?></h4>
        </div>
        <br>
        <div class="button">
          <button type="button" class="btn btn-warning botoes" style="margin-bottom: 10px;">Comprar</button>

        </div>        
        
      </form>
    </div>
  </div>

  <div class="cart">
    
    <span class="material-symbols-outlined carrinho-icon">shopping_cart</span>
    <i class="fa fa-shopping-cart"></i>
    <span id="carrinho-quantidade"></span>
    
  </div>

  <?php require 'rodape.php'; ?>
</body>
</html>
<script>
  let cartItems = [];

  function addToCart() {
    cartItems.push('<?php echo $produto["nome"]; ?>');
    alert('Produto adicionado ao carrinho!');
    updateCart();
  }

  function updateCart() {
    document.getElementById('carrinho-quantidade').innerText = cartItems.length;
  }

  document.querySelector('.botoes').addEventListener('click', addToCart);

  $('.carrinho-icon').click(function() {
    var quantidade = parseInt($('#carrinho-quantidade').text()) || 0;
    alert('Você tem ' + quantidade + ' produtos no carrinho.');
    
  });

  $('#carrinho-quantidade').text(quantidade + 1);
  
  updateCart();

</script>
