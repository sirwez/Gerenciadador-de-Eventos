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

if (isset($_POST['btn-cadastrarSala']))
{

    $array = $_POST;
    
    $nome = clear($_POST['nome']);
    $desc = clear($_POST['desc']);
    $capacidade = clear($_POST['capacidade']);

    $sql = "INSERT INTO sala (nome, resumo, capacidade) VALUES ('$nome', '$desc' , '$capacidade')";

    if (mysqli_query($connect, $sql))
    {

        $id = mysqli_insert_id($connect);
        foreach ($array as $key => $value)
        {
            if ((strcmp($key, 'nome') != 0) && (strcmp($key, 'capacidade') != 0) && (strcmp($key, 'btn-cadastrarSala') != 0))
            {
                $especialidade = $key;
                $sql = "INSERT INTO sala_tem_especialidade (id_sala, especialidade) VALUES ('$id', '$especialidade')";
                mysqli_query($connect, $sql);
            }
    
        }
        $_SESSION['mensagem'] = "Sala cadastrada com sucesso";
        header('Location: ../index.php');

    }
    else
    {

        $_SESSION['mensagem'] = "erro ao cadastrar";
        header('Location: ../index.php');
    }

}

?>