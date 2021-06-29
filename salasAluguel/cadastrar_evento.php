<?php
include_once 'php_action/db_connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Evento</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  
    <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1>Cadastro de Evento</h1>
    </div>
    <div class="container mt-5">
      <form action="salvar_evento.php" method="POST">
        <div class="form-group">

          <label for="capacidade">Número de Convidados</label>
          <input class="form-control mb-3" id="capacidade" name="capacidade" type="number">

          <label for="data">Dia do Evento</label>
          <input class="form-control mb-3" id="data" name="data" type="date">

          <label >Especialidades</label><br>
          <div class="form-check">
            
          <?php
          $sql = "SELECT * FROM especialidade";
          $result = mysqli_query($connect, $sql);
          //if (nenhum especialidade)
          while ($dado = mysqli_fetch_assoc($result)){  
              echo <<<END
                <input class="form-check-input" type="checkbox" value="" id="{$dado['nome']}" name="{$dado['nome']}">
                <label class="form-check-label" for="{$dado['nome']}"> {$dado['nome']}</label><br>
              END;
          }
          ?>
          </div>

        </div>
        <div  class="text-center">
        <button type="submit" class="btn btn-outline-secondary mt-5 mx-auto" name="btn-cadastrar">Criar</button>
        </div>
        
      </form>
    </div>
  </body>
</html>
