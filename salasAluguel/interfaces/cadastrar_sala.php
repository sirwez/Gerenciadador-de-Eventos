


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

    <div class="container my-5">
      <h1>Cadastro de Sala</h1>
    </div>
    <div class="container mt-5">
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome da Sala</label>
          <input class="form-control" id="exampleFormControlInput1" name="nome">
          <label for="exampleFormControlInput1">Capacidade</label>
          <input class="form-control" id="exampleFormControlInput1" name="capacidade">
          
          <div class="form-check">
            
            <input class="form-check-input" type="checkbox" value="" id="Especialidade_1" name="Especialidade_1">
            <label class="form-check-label" for="Especialidade_1"> Especialidade_1</label>
            
            <input class="form-check-input" type="checkbox" value="" id="Especialidade_2" name="Especialidade_2">
            <label class="form-check-label" for="Especialidade_2"> Especialidade_2 </label>

          </div>

        </div>
        <div  class="text-center">
        <button type="submit" class="btn btn-outline-secondary mt-5 mx-auto">Criar</button>
        </div>
        
      </form>
    </div>
  </body>
</html>
