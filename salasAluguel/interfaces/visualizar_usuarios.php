
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Lista de Usuários</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1>Lista de Usuários</h1>
    </div>
    <div class="container mt-5">

    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">CPF</th>
        </tr>
    </thead>

    <tbody>
    
        <tr>
        <td>Gustavo André</td>
        <td>gstvuao@live.com</td>
        <td>123.456.789-01</td>
        </tr>
        
        <tr>
        <td>Gustavo André</td>
        <td>gstvuao@live.com</td>
        <td>123.456.789-01</td>
        </tr>
        
        <tr>
        <td>Gustavo André</td>
        <td>gstvuao@live.com</td>
        <td>123.456.789-01</td>
        </tr>

    </tbody>
    </table>

</div>
</body>