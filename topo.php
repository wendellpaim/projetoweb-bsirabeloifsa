<?php
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $aux = parse_url($url, PHP_URL_PATH);
    $divisor = explode('/', $aux);
    $valor = $divisor[count($divisor)-2];   
?>
<!DOCTYPE html>
<html lang="pt">
<head>
      <meta charset="utf-8"/>
      <title></title>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>     
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      <link rel="stylesheet" type="text/css" href="css/estilo.css">
      <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
      <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
      <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
      <script type="text/javascript" src="slick/slick.min.js"></script>
</head>
<body>       
    
    <div id="menu"> 
            
        <nav class="navbar navbar-expand-lg barra-menu">                     
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>   
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <?php if ($valor == "crud") { ?>
                <div class="col-8">
                    <div class="mr-5 container d-flex align-items-center">                    
                        <div id="topo">
                            <h3>Loja Virtual</h3>
                        </div>
                        <img src="../imagens/icone-loja.png" alt="Logo"style="height: 50px; width: 50px;">
                    </div>
                </div> 
                <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../quem-somos.php">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contato.php">Fale Conosco</a>
                        </li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gerenciamento
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cadastrar_produto.php">Cadastrar Produtos</a>                                               
                                <a class="dropdown-item" href="listar_produtos.php">Listar Produtos</a>
                            </div>
                        </li>                
                    </ul>
                <?php } else { ?>
                    <div class="col-8">
                        <div class="mr-5 container d-flex align-items-center">                    
                            <div id="topo">
                            <h3>Loja Virtual</h3>
                            </div>
                            <img src="imagens/icone-loja.png" alt="Logo"style="height: 50px; width: 50px;">
                        </div>
                    </div> 
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quem-somos.php">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contato.php">Fale Conosco</a>
                        </li>
                    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Gerenciamento
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="crud/cadastrar_produto.php">Cadastrar Produtos</a>                                               
                                <a class="dropdown-item" href="crud/listar_produtos.php">Listar Produtos</a>
                            </div>
                        </li>                
                    </ul>
                <?php } ?>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form> -->
            </div>
            </nav>
    </div>
</body>
<script>
    $(document).ready(function(){
        
      $('.slideshow').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
      });
    });
  </script>
</html>