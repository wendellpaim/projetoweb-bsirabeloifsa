<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <style>      
        .card-cadastro {
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            border: none;            
            max-width: 600px;           
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .card-header-cadastro {
            text-align: center;
            font-size: 24px;
            /* background-color: #F2F2F2; */
            border: none;
            font-weight: bold;
        }

        .card-body-cadastro {
            padding: 20px;
        }

        .form-group-cadastro {
            margin-bottom: 20px;
        }

        .botao-cadastro {
            width: 100%;
        }

        .alerta-erro {
            text-align: center !important;
            margin-right: 20px;
            margin-left: 20px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card card-cadastro">
            <div class="card-header card-header-cadastro">
                <h1>Cadastro de Usuário</h1>
            </div>
            <div class="card-body card-body-cadastro">
                <form method="post" action="valida_cadastro.php">
                    <div class="form-group form-group-cadastro">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control"  name="nome" id="nome" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" class="form-control" maxlength="15" onkeyup="mascaraTelefone(event)" name="telefone" id="telefone" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="cep">CEP:</label>
                        <input type="text" class="form-control" name="cep" id="cep" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="username">Nome de Usuário:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group form-group-cadastro">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" id="senha" required>
                    </div>                    
                    <button type="submit" class="btn btn-primary botao-cadastro">Cadastrar</button>   
                </form>
            </div>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger alerta-erro"><?php echo $error; ?></div>
            <?php } ?>
          
        </div>
    </div>
</body>
</html>
<script>    
    const mascaraTelefone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
    }

  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }
</script>