<?php
include_once 'php_action/db_connect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Relatório de Salas</title>
    <meta charset="utf-8">
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  </head>
  <body>
  <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1 class="text-center">Relatório de Salas</h1>
    </div>
    <div class="container mt-5">

    <table class="table table-hover sortable">
    <thead>
        <tr >
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">CPF</th>
        <th scope="col">Organizador em Eventos</th>
        <th scope="col">Participante em Eventos</th>
        </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT * FROM usuario";

    $result = mysqli_query($connect, $sql);
    //if (nenhuma sala)
    while ($dado = mysqli_fetch_assoc($result)){
        $sql = "SELECT COUNT(id_evento) AS num_organiz FROM evento where evento.organizador={$dado['id_usuario']}";
        $result2 = mysqli_query($connect, $sql);
        $org = mysqli_fetch_assoc($result2);
        $sql = "SELECT COUNT(id_evento) AS num_part FROM convidados where convidados.id_usuario={$dado['id_usuario']}";
        $result3 = mysqli_query($connect, $sql);
        $par = mysqli_fetch_assoc($result3);
        echo <<<END
            <tr>
            <td>{$dado['nome']}</td>
            <td>{$dado['email']}</td>
            <td>{$dado['cpf']}</td>
            <td>{$org['num_organiz']}</td>
            <td>{$par['num_part']}</td>
        END;
    }

    ?>

        </tr>
    </tbody>
    </table>
</div>
</body>
