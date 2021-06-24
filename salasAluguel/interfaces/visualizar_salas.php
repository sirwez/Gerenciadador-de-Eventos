
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Lista de Salas</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1>Lista de Salas</h1>
    </div>
    <div class="container mt-5">

    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Capacidade</th>
        <th scope="col">Descrição</th>
        <th scope="col">Especialidades</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>Sala 1</td>
        <td>300</td>
        <td>Sala normal usada principalmente para aulas.</td>
        <td>Projetor, TV Pequena</td>
        </tr>
        <tr>
        <td>Sala 2</td>
        <td>200</td>
        <td>Sala normal usada principalmente para aulas.</td>
        <td>Projetor, TV Pequena</td>
        </tr>
        <tr>
        <td>Cinema 1</td>
        <td>100</td>
        <td>Sala grande com cadeiras acolchoadas utilizada para ver filmes.</td>
        <td>Projetor Grande</td>
        </tr>
    </tbody>
    </table>

</div>
</body>