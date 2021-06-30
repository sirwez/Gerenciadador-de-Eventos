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
  <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1>Lista de Especialidades</h1>
    </div>
    <div class="container mt-5">
    <div class="card mx-auto" style="width: 25rem;">
    <ul class="list-group list-group-flush">
    <?php
    $sql = "SELECT * FROM especialidade";
    $result = mysqli_query($connect, $sql);
    //if (nenhuma especialidade)
    while ($dado = mysqli_fetch_assoc($result)){  
      echo <<<END
      <li class="list-group-item">
        <div class="d-flex">
          <div class=" flex-fill text-center">
            {$dado['nome']}
          </div>
          <div class="bd-highlight"> 
            <form action="php_action/deleteRegistro.php" method="POST">
              <button class="btn btn-outline-danger btn-sm ms-3" name="delete" type="submit" value="visualizar_especialidades-{$dado['nome']}">
                Apagar
              </button>
            </form>
          </div>
        </div>
      </li>
      END;
    }
    ?>
    </ul>
    </div>
    </div>
  </body>
</html>