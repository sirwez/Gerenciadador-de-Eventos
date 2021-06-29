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

if (isset($_POST['btn-createSala']))
{
    $nome = clear($_POST['nome']);
    $descricao = clear($_POST['descricao']);
    $data = clear($_POST['data']);
    $organizador = clear($_POST['organizador']);
    $sala = $_POST['btn-createSala'];
    if ($nome==''){
        $_SESSION['mensagem'] = "Nome invalido";
        header('Location: ../index.php');
        return;
    }

    $sql = "INSERT INTO evento(nome, descricao, data, organizador, sala) VALUES 
    ('{$nome}', '{$descricao}', '{$data}', '{$organizador}', '{$sala}')";
    echo($sql);
    if (mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Evento cadastrado com sucesso";
        header('Location: ../index.php');
    }
    else
    {
        $_SESSION['mensagem'] = "Erro ao cadastrar evento.";
        header('Location: ../index.php');
    }

}
?>