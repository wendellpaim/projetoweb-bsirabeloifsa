<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">    
    <title>Contato</title>
</head>
<body>
    <?php require 'topo.php'; ?>    
    <form class="form text-center row mt-3" action="envioemailLOJA.php" method="post" id="form-contato" onsubmit="return validarFormulario()">
      <div class="form-group col-sm-4 mx-auto">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Digite seu nome">
      </div>
      <div class="form-group col-sm-4 mx-auto">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Digite seu email">
      </div>
      <div class="form-group col-sm-4 mx-auto">
        <label for="telefone">Telefone</label>
        <input type="tel" class="form-control" name="telefone" maxlength="15" onkeyup="mascaraTelefone(event)" placeholder="Digite seu telefone">
      </div>
      <div class="form-group col-sm-4 mx-auto">
        <label for="assunto">Assunto</label>
        <textarea class="form-control" name="assunto" rows="1" placeholder="Informe o assunto"></textarea>
      </div>
      <div class="form-group col-sm-4 mx-auto">
        <label for="mensagem">Mensagem</label>
        <textarea class="form-control" name="mensagem" rows="3" placeholder="Digite uma mensagem"></textarea>
      </div>
      <button type="submit" id="enviar-email" class="btn btn-primary botao-form mx-auto" name="send">Enviar</button>
    </form>

    <div class="informacoes text-center mt-5 mb-5">
        <h4 class="mb-3">Informações</h4>
        <p><span class="inf-txt">Email: </span>lojavirtual556677@gmail.com</p>
    </div>


    <?php require 'rodape.php'; ?>  
</body>
</html>
<script>
  function validarFormulario() {
      // verifica se todos os campos obrigatórios foram preenchidos
      if (document.getElementsByName('name')[0].value == '' ||
          document.getElementsByName('email')[0].value == '' ||
          document.getElementsByName('telefone')[0].value == ''  ||
          document.getElementsByName('assunto')[0].value == ''  ||
          document.getElementsByName('mensagem')[0].value == '') {
        // exibe mensagem de erro e cancela o envio do formulário
        alert('Por favor, preencha todos os campos obrigatórios!');
        return false;
      }

      // se chegou até aqui, todos os campos foram preenchidos, pode enviar o formulário
      return true;
    }
    
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
