<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Usuário</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <?php require("navbar.php"); ?>

    <div class="container my-5 text-center">
      <h1>Cadastro de Usuário</h1>
    </div>
    <div class="card mx-auto" style="width: 50rem;">
    <div class="container mt-5">
    <form action="php_action/createUsuario.php" method="POST">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input class="form-control mb-3" id="nome" name="nome">
          <label for="cpf">CPF</label>
          <input type="text" class="form-control cpf-mask mb-3" id="cpf" name="cpf">
          <label for="email">E-mail</label>
          <input type="email" class="form-control mb-3" id="email" name="email">
        </div>
        <div  class="text-center">
        <button type="submit" class="btn btn-outline-success mt-5 mx-auto" name="btn-cadastrarUsuario">Cadastrar</button>
        </div>
        
      </form>
    </div>
    <br>
    </div>
  </body>
    <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</html>
