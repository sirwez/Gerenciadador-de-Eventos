<?php
include_once 'php_action/db_connect.php';
?>

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
      <h1 class="text-center">Lista de Usuários</h1>
    </div>
    <div class="container mt-5">

    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">CPF</th>
        <th scope="col">Apagar</th>
        </tr>
    </thead>

    <tbody>

    <?php
    //usuario comum
    $sql = "SELECT * FROM usuario HAVING id_usuario NOT IN (select organizador from evento)";
    $result = mysqli_query($connect, $sql);
    //if (nenhum usuario)
    while ($dado = mysqli_fetch_assoc($result)){  
        echo <<<END
          <tr>
          <td>{$dado['nome']}</td>
          <td>{$dado['email']}</td>
          <td>{$dado['cpf']}</td>
          <td>
          <form action="php_action/deleteRegistro.php" method="POST">
            <button class="btn btn-outline-danger btn-sm " name="delete" type="submit" value="visualizar_usuarios-{$dado['id_usuario']}">
              Apagar
            </button>
          </form>
          </td>
          </tr>
        END;
    }
    //usuario organizador
    $sql = "SELECT distinct usuario.* FROM usuario, evento where id_usuario=organizador";
    $result = mysqli_query($connect, $sql);
    //if (nenhum usuario)
    while ($dado = mysqli_fetch_assoc($result)){  
        echo <<<END
          <tr>
          <td>{$dado['nome']}</td>
          <td>{$dado['email']}</td>
          <td>{$dado['cpf']}</td>
          <td>Organizador</td>
          </tr>
        END;
    }
    ?>

    </tbody>
    </table>

</div>
</body>