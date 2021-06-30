<?php
include_once 'php_action/db_connect.php';
date_default_timezone_set('America/Fortaleza');
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  <?php require("navbar.php"); ?>

    <div class="container my-5">
      <h1 class="text-center">Lista de Eventos</h1>
    </div>
    <div class="container mt-5">

    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Organizador</th>
        <th scope="col">Data</th>
        <th scope="col"> Ações </th>
        </tr>
    </thead>
    <tbody>
    
    <?php
    $sql = "SELECT * FROM evento order by CURDATE()>data, data";
    $result = mysqli_query($connect, $sql);
    //if (nenhuma sala)
    while ($dado = mysqli_fetch_assoc($result)){
        $sql = "SELECT usuario.nome FROM usuario where id_usuario={$dado['organizador']}";
        $result2 = mysqli_query($connect, $sql);
        $dado2 = mysqli_fetch_assoc($result2);
        $p = '';
        $d = date("d-m-Y", strtotime($dado['data']));

        if (strtotime(date('d-m-Y')) > strtotime($d)){
          $p = ' class="table-secondary"';
        }elseif (strtotime(date('d-m-Y')) == strtotime($d)){
          $p = ' class="table-warning"';
        }
        echo <<<END
            <tr {$p}> 
            <td>{$dado['nome']}</td>
            <td>{$dado2['nome']}</td>
            <td>{$d}</td>
            <td> <div class="d-flex"> 
            <a href="cadastrar_convidado.php?id={$dado['id_evento']}" type="submit" class="btn btn-outline-secondary btn-sm me-3" name="btn-verMais" value="{$dado['id_evento']}">Ver Mais</a>

            <form action="php_action/deleteRegistro.php" method="POST">
              <button class="btn btn-outline-danger btn-sm " name="delete" type="submit" value="index-{$dado['id_evento']}">
                Apagar
              </button>
            </form>
            </div>
            </td>
          
            </tr>
        END;
    }
    ?>
    </tbody>
    </table>
</div>
</body>

</html>