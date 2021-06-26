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
  <?php require_once 'interfaces/navbar.php';
?>
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
    <?php
    $sql = "SELECT * FROM sala";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0):

        while ($dados = mysqli_fetch_array($result)):
    ?>
    <tbody>
        <tr>
        <td class="text-center" style="width: 5rem;"><?php echo $dados['nome']; ?></td>
        <td class="text-center" ><?php echo $dados['capacidade']; ?></td>
        <td ><?php echo $dados['resumo']; ?></td>
        <td  class="text-center" >
        <?php
            $sql2 = "SELECT * FROM sala_tem_especialidade";
            $result2 = mysqli_query($connect, $sql2);
            $dados2 = mysqli_fetch_array($result2);
            $cont = 0;
            while ($dados2 = mysqli_fetch_array($result2)):
                if ($dados['id_sala'] == $dados2['id_sala']): ?>
                    <span class="text-center"><?php echo $dados2['especialidade']; ?></span>
                    <?php
                else: ?>
                    <?php
                    $cont++;
                endif;
            ?>
            <?php
                if ($cont == 0):
            ?>
            <?php
                endif;
            endwhile;
            ?>
                    </td>
                    </tr>
                    
                </tbody>
                <?php
            endwhile;
            else: ?>
                <td  style="width: 15rem;">Sem salas cadastradas</td>
     <?php
            endif;
            ?>
    </table>

</div>
</body>