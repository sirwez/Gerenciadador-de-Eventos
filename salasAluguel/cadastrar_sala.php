<?php
include_once 'php_action/db_connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Sala</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <?php require("navbar.php"); ?>
    <div class="container my-5 text-center">
      <h1>Cadastro de Sala</h1>
    </div>
    <div class="card mx-auto" style="width: 50rem;">
    <div class="container mt-5">
      <form action="php_action/createSala.php" method="POST">
        <div class="form-group">
          <label for="nome">Nome da Sala</label>
          <input class="form-control mb-3" id="nome" name="nome">
          <label for="desc">Descrição</label>
          <input class="form-control mb-3" id="desc" name="desc" maxlength="255">
          <label for="capacidade">Capacidade</label>
          <input class="form-control mb-3" type="number" id="capacidade" name="capacidade" min="0">
          
          <label >Especialidades</label><br>

          <div class="form-check">
                <?php
                    $sql = "SELECT * FROM especialidade";
                    $result = mysqli_query($connect, $sql);

                    if (mysqli_num_rows($result) > 0):
                        while ($dados = mysqli_fetch_array($result)):
                        ?>
            <input class="form-check-input" type="checkbox" value="<?php echo $dados['nome'];?>" id="<?php echo $dados['nome'];?>" name="<?php echo $dados['nome'];?>">
            <label class="form-check-label" for="Especialidade_1"> <?php echo $dados['nome'] ?></label><br>

            <?php endwhile;
           else: ?>
               <p>Sem especialidades cadastradas!!!</p>
							<?php
                   endif;
                ?>
          </div>

          </div>
           <div  class="text-center">
           <button type="submit" class="btn btn-outline-success mt-5 mx-auto " name="btn-cadastrarSala">Cadastrar</button>

      </div>
        
      </form>
      <br>
    </div>
    </div>
  </body>
</html>