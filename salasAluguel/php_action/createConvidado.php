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


if (isset($_POST['btn-add']))
{
    $id = $_POST['btn-add'];
    foreach ($_POST as $key => $value)
    {
        if (strcmp($key, 'btn-add') != 0){
            $sql = "INSERT INTO convidados (id_evento, id_usuario) VALUES ('$id', '$value')";
            mysqli_query($connect, $sql);
        }

    }
    $_SESSION['mensagem'] = "Convidados com Sucesso";
    header('Location: ../index.php');
}

?>