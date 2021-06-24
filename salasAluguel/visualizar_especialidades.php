<?php
include_once 'php_action/db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Lista de Especialidades</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once 'interfaces/navbar.php';
?>

    <div class="container my-5 text-center">
      <h1>Lista de Especialidades</h1>
    </div>
    <div class="container mt-5">
      
    <div class="card mx-auto text-center" style="width: 25rem;">
    <ul class="list-group list-group-flush">
    <?php
$sql = "SELECT * FROM especialidade";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0):

    while ($dados = mysqli_fetch_array($result)):
?>

<li class="list-group-item"><?php echo $dados['nome']; ?></li>

    <?php
    endwhile;
  else: ?>
<li class="list-group-item">Null</li>
							<?php
    endif;
?>
    </ul>
    </div>
    </div>
  </body>
</html>