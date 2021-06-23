
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Especialidade</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1>Cadastro de Especialidade</h1>
    </div>
    <div class="container mt-5">
      <form>
        <div class="form-group">
          <label for="exampleFormControlInput1">Especialidade</label>
          <input class="form-control" id="exampleFormControlInput1" name="especialidade">
        </div>
        <div  class="text-center">
        <button type="submit" class="btn btn-outline-secondary mt-5 mx-auto">Criar</button>
        </div>
        
      </form>
    </div>
  </body>
</html>
