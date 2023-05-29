<?php require 'conexao.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>

<body>
    <?php require 'topo.php'; ?>

    <div class="container">
        <div class="row">
            <h2 class="mb-3 mt-3">Produtos</h2>
            <?php if (isset($_GET['categoria'])) {
                    $id_categoria = $_GET['categoria'];
                    $categoria = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
                    $cat = mysqli_query($conn, $categoria);
                    $cat_row = mysqli_fetch_assoc($cat);
            ?>
            <h2><?php echo $cat_row['nome_categoria']; ?></h2>
            <?php } ?>

            <?php  $sqlCategoria = "SELECT * FROM categoria";
                   $resultado = mysqli_query($conn, $sqlCategoria);
                   if (mysqli_num_rows($resultado) > 0) {                        
            ?>
            <div class="col-md-3">
                <h4>Categorias</h4>
                <ul style="list-style: none;">
                <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>     
                    <a class="texto-categorias" href="produtos.php?categoria=<?php echo $row['id_categoria']; ?>"><li><?php echo $row['nome_categoria']; ?></p></a>               
                <?php } ?>
                </ul>
            </div>
            
            <?php      
                   } 
            ?>

            <div class="col-md-9">
                <div class="row">
                    <?php
                    if (isset($_GET['categoria'])) {
                        $id_categoria = $_GET['categoria'];
                        // Filtra a consulta para incluir apenas os produtos da categoria correspondente
                        $sql = "SELECT * FROM produtos WHERE id_categoria = '$id_categoria'";
                    } else {
                        //Aqui você faz uma conexão com o banco de dados e retorna as informações dos produtos                        
                        $sql = "SELECT * FROM produtos";
                    }
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <!-- <div class="col-md-3"> -->
                        <div class="col-md-3 col-s-6" style="border: 1px solid black;">
                            <div class="card card-produto" style="border: none;">
                                <p class="card-title titulo-produto"><?php echo $row["nome"]; ?></h3>
                                    <img class="card-img-top" src="imagens/<?php echo $row["imagem"]; ?>" alt="<?php echo $row["nome"]; ?>">
                                <div class="card-body">

                                    <!-- <p class="card-text"> <?php /*echo $row["descricao"];*/ ?></p> -->
                                    <p class="card-text" style="font-weight: bold; font-size: 21px; position:absolute;bottom: 15px;">R$ <?php echo $row["preco"] ?></p>
                                </div>    
                              
                            </div>
                            <div>                       
                                <a href="visualizar_produto.php?id=<?= $row['id_produto'] ?>"><button type="button" class="btn btn-warning botoes" style="margin-bottom: 10px;">Comprar</button></a>
                            </div>
                        </div>

                    <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Produto 1">
                    <div class="card-body">
                    <h3 class="card-title">Produto 1</h3>
                    <p class="card-text">Descrição do Produto 1</p>
                    </div>
                </div>
            </div>    
            <div class="col-md-3">    
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Produto 2">
                    <div class="card-body">
                        <h3 class="card-title">Produto 2</h3>
                        <p class="card-text">Descrição do Produto 2</p>
                    </div>
                </div>        
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/150" alt="Produto 2">
                    <div class="card-body">
                        <h3 class="card-title">Produto 3</h3>
                        <p class="card-text">Descrição do Produto 3</p>
                    </div>            
                </div>
            </div> -->

    </div>
    </div>
    <?php require 'rodape.php'; ?>
</body>

</html>