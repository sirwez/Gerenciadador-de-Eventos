<?php
include_once 'php_action/db_connect.php';
?>

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
      <h1 class="text-center">Lista de Salas</h1>
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

    <?php
    $sql = "SELECT * FROM sala";
    $result = mysqli_query($connect, $sql);
    //if (nenhuma sala)
    while ($dado = mysqli_fetch_assoc($result)){
        $sql = "SELECT especialidade FROM sala_tem_especialidade where id_sala={$dado['id_sala']}";
        $result2 = mysqli_query($connect, $sql);
        $esp = '';
        while ($dado2 = mysqli_fetch_assoc($result2)){
            $esp .= ($dado2['especialidade'].', ');
        }
        $esp = substr($esp,0,-2);
        echo <<<END
            <tr>
            <td>{$dado['nome']}</td>
            <td>{$dado['capacidade']}</td>
            <td>{$dado['descricao']}</td>
            <td>{$esp}</td>
        END;
    }
    ?>
        </tr>
    </tbody>
    </table>
</div>
</body>
