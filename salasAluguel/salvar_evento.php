<?php
include_once 'php_action/db_connect.php';

function clear($input){
    global $connect;
 
    $var = mysqli_escape_string($connect, $input);
    $var = htmlspecialchars($var);
     return $var;
 }
 
 if(isset($_POST['btn-cadastrar'])){
  $num = clear($_POST['capacidade']);
  $data = clear($_POST['data']);
  $count = 0;
  $flag = false;
  $sql = '';
  foreach ($_POST as $key => $value){
    if ( strcmp($key, 'data') != 0 && strcmp($key, 'capacidade') != 0 && strcmp($key, 'btn-cadastrar') != 0 ){
      $especialidade = $key;
      $especialidade = str_replace('_', " ", $especialidade);

      if ($count != 0){
        $sql = 
        "(select sala_tem_especialidade.* from sala_tem_especialidade, (select id_sala from ".
        $sql.
        " as aux".strval($count)." where aux".strval($count).".especialidade='".$especialidade."') as aux".strval($count+1)." where aux".strval($count+1).".id_sala = sala_tem_especialidade.id_sala)";
        $count += 2;

      }else{
        $flag = true;
        $sql = "(select sala_tem_especialidade.* from sala_tem_especialidade, (select id_sala from sala_tem_especialidade where especialidade='".$especialidade."') as aux".strval($count)." where aux".strval($count).".id_sala = sala_tem_especialidade.id_sala)";
        $count ++;
      }
    }
  }
  if ($flag){
    $sql = substr($sql, 32);
    $sql = "(select distinct sala_tem_especialidade.id_sala".$sql;
  }
  else {
    $sql = "(select sala.* from sala)";
  }
  $sql = "select sala.* from sala, ".
         $sql.
         "as aux".strval($count)." where sala.capacidade >= ".strval($num)." and aux".strval($count).".id_sala = sala.id_sala ".
         "HAVING sala.id_sala NOT IN (select s.id_sala as id from sala as s, evento where s.id_sala = evento.sala and evento.data = '".$data."')";
}

$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Evento</title>
    <meta charset="utf-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
  
  <?php require("navbar.php");?>

  <div class="container mt-5">

  <form action="php_action/createEvento.php" method="POST">
        <div class="card mx-auto text-center p-3" style="width: 50rem;">

          <legend>Evento</legend>

          <?php

          $esp = '';
          $flag2 = false;
          foreach ($_POST as $key => $value){
            if ( strcmp($key, 'data') != 0 && strcmp($key, 'capacidade') != 0 && strcmp($key, 'btn-cadastrar') != 0 ){
              $flag2 = true;
              $especialidade = $key;
              $especialidade = str_replace('_', " ", $especialidade);
              $esp .= $especialidade.', ';
            }
          }
          $esp = substr($esp,0,-2);

          echo <<<END
          <div class="mb-3 text-center">
            <label for="capacidade" class="form-label">Número de Convidados</label>
            <input type="number" id="capacidade" name="capacidade" class="form-control" value="{$num}" readonly="readonly">
          </div>
          
          <div class="mb-3 text-center">
            <label for="data" class="form-label">Data</label>
            <input type="date" id="data" name="data" class="form-control" value="{$data}" readonly="readonly">
          </div>
          END;

          if ($flag2){
            echo <<<END
              <div class="mb-3">
              <label for="data" class="form-label">Especialidades</label>
              <p>{$esp}</p>
              </div>
            END;
          }
          
          ?>


          <div>
          
            <div class="form-group">
            <label for="organizador" class="form-label">Organizador</label>
            <select class="form-control mb-3" id="organizador" name="organizador">
            <?php

            $sqlu = "SELECT * FROM usuario";
            $result2 = mysqli_query($connect, $sqlu);
            while ($dado = mysqli_fetch_assoc($result2)){  
                echo <<<END
                  <option value="{$dado['id_usuario']}">{$dado['nome']}</option>
                END;
            }
            ?>
            </select>

            <label for="nome" class="form-label">Nome do Evento</label>
            <input class="form-control mb-3" id="nome" name="nome" maxlength="50">
          
            <label for="descricao" class="form-label">Descrição do Evento</label>
            <input type="text" class="form-control mb-3" id="descricao" name="descricao" maxlength="255">

    </div>
  </div>

  <?php
  if ($result->num_rows==0):
    echo <<<END
    <h2>Nenhuma sala adequada encontrada</h2>
    <a href="cadastrar_evento.php" class="btn border-0 btn-lg" type="submit">Voltar</a>
    END;
  else:
  ?>

  <h1 class="text-center mt-5">Lista de Salas Disponíveis</h1>

  <table class="table table-hover">
  <thead>
      <tr>
      <th scope="col">Nome</th>
      <th scope="col">Capacidade</th>
      <th scope="col">Descrição</th>
      <th scope="col">Especialidades</th>
      <th scope="col">Selecionar</th>
      </tr>
  </thead>
  <tbody>

  <?php

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
          <td><button type="submit" class="btn btn-outline-secondary btn-sm " name="btn-createSala" value="{$dado['id_sala']}">Selecionar</button></td>
          </tr>
      END;
  }
  ?>
  </tbody>
  </table>

  <?php
  endif;
  ?>


  </form>
  </div>
  </body>
</html>
