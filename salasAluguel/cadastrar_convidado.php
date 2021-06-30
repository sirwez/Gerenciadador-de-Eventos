<?php
include_once 'php_action/db_connect.php';

if (isset($_GET['id'])){
    $sql = "SELECT * FROM evento where id_evento={$_GET['id']}";
    $result = mysqli_query($connect, $sql);
    $dado = mysqli_fetch_assoc($result);
}

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
      <h1 class="text-center"><?php echo $dado['nome'];?></h1>
    </div>
    <div class="container mt-5"><div class="card p-4">
        <?php
        $sql = "select sala.nome as sala, usuario.nome as usuario from sala, usuario where sala.id_sala = {$dado['sala']} and usuario.id_usuario = {$dado['organizador']}";
        $result2 = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_assoc($result2);

        $d = date("d-m-Y", strtotime($dado['data']));

        echo <<<END
        <label for="descricao">Descrição do Evento</label>
        <p class="form-control mb-3" id="descricao">{$dado['descricao']}</p>
        
        <label for="data">Data</label>
        <p class="form-control mb-3" id="data">{$d}</p>
        
        <label for="organizador">Organizador</label>
        <p class="form-control mb-3" id="organizador">{$dados['usuario']}</p>
        
        <label for="sala">Sala</label>
        <p class="form-control mb-3" id="sala">{$dados['sala']}</p>
        
        <label">Convidados</label>

        END;

        $sql = "select * from usuario, convidados where convidados.id_evento = {$_GET['id']} and convidados.id_usuario = usuario.id_usuario";
        $result3 = mysqli_query($connect, $sql);
        $conv = '';
        $flag = false;
        while ($dado2 = mysqli_fetch_assoc($result3)){
            $conv = $conv . $dado2['nome'] . ', ';
            $flag = true;
        }
        if ($flag)
            $conv = substr($conv,0,-2);
        else
            $conv = 'Nenhum convidado';

        echo <<<END
            <p>
                {$conv}
            </p>
        END;

        ?>
    </div></div>

    <div class="container mt-5">
        <div class="card p-4">
            <form action="php_action/createConvidado.php" method="POST">
                <?php
                //select usuario.id_usuario from usuario where id_usuario != (select convidados.id_usuario from convidados where convidados.id_evento = 8)
                    $sql = "select * from usuario where usuario.id_usuario!={$dado['organizador']} HAVING usuario.id_usuario NOT IN (select convidados.id_usuario from convidados where convidados.id_evento = {$dado['id_evento']})";
                    $result3 = mysqli_query($connect, $sql);
                    while ($usuario = mysqli_fetch_assoc($result3)){
                        echo <<<END
                            <input class="form-check-input" type="checkbox" value="{$usuario['id_usuario']}" id="{$usuario['id_usuario']}" name="{$usuario['id_usuario']}">
                            <label class="form-check-label" for="{$usuario['id_usuario']}"> {$usuario['nome']}</label><br>
                        END;
                    }

                echo '<button type="submit" class="btn btn-outline-secondary mt-5 mx-auto" value='.$dado['id_evento'].' name="btn-add">Convidar</button>';

                ?>
            </form>
         </div>
    </div>



    </body>

</html>
