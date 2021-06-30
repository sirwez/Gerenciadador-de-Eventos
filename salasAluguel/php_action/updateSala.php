<?php
session_start();
require_once 'db_connect.php';

function clear($input)
{
    global $connect;

    $var = mysqli_escape_string($connect, $input);
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn-id']))
{
    
    $nome = clear($_POST['nome']);
    $desc = clear($_POST['desc']);
    $capacidade = clear($_POST['capacidade']);
    echo <<<END
    {$nome}<br>
    {$desc}<br>
    {$capacidade}<br>
    {$_POST['btn-id']}<br>
    END;
    $sql = "DELETE FROM sala_tem_especialidade where id_sala = {$_POST['btn-id']}";
    mysqli_query($connect, $sql);

    $sql = "UPDATE sala SET nome = '{$nome}', descricao = '{$desc}', capacidade = {$capacidade} WHERE id_sala = {$_POST['btn-id']}";

    if (mysqli_query($connect, $sql)){
        $id = $_POST['btn-id'];

        foreach ($_POST as $key => $value)
        {
            if ((strcmp($key, 'nome') != 0) && (strcmp($key, 'capacidade') != 0) && (strcmp($key, 'btn-cadastrarSala') != 0) && (strcmp($key, 'desc') != 0) )
            {
                
                $especialidade = $key;
                $novaEsp = str_replace('_', " ", $especialidade);
                $sql = "INSERT INTO sala_tem_especialidade (id_sala, especialidade) VALUES ('$id', '$novaEsp')";
                mysqli_query($connect, $sql);
            }
    
        }
        $_SESSION['mensagem'] = "Sala cadastrada com sucesso";
        header('Location: ../visualizar_salas.php');

    }
    else
    {

        $_SESSION['mensagem'] = "erro ao cadastrar";
        header('Location: ../visualizar_salas.php');
    }

}

?>