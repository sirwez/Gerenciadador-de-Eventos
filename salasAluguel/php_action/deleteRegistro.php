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

if (isset($_POST['delete'])){
    $info = explode('-', $_POST['delete']);
    $arq = $info[0]; $id = $info[1];
    echo $arq;

    if (strcmp($arq, 'visualizar_especialidades')==0){
        $sql1 = "delete from sala_tem_especialidade where especialidade='$id'";
        $sql2 = "delete from especialidade where nome='$id'";
        $result = mysqli_query($connect, $sql1);
        $result = mysqli_query($connect, $sql2);

    } else if (strcmp($arq, 'visualizar_usuarios')==0){
        $sql1 = "delete from convidados where id_usuario=$id";
        $sql2 = "delete from usuario where id_usuario=$id";
        echo $sql1;
        echo $sql2;
        $result = mysqli_query($connect, $sql1);
        $result = mysqli_query($connect, $sql2);

    } else if (strcmp($arq, 'visualizar_salas')==0){
        $sql1 = "delete from sala where id_sala=$id";
        $sql2 = "delete from sala_tem_especialidade where id_sala=$id";
        echo $sql1;
        echo $sql2;
        $result = mysqli_query($connect, $sql1);
        $result = mysqli_query($connect, $sql2);

    } else if (strcmp($arq, 'index')==0){
        $sql1 = "delete from convidados where id_usuario=$id";
        $sql2 = "delete from evento where id_evento=$id";
        echo $sql1;
        echo $sql2;
        $result = mysqli_query($connect, $sql1);
        $result = mysqli_query($connect, $sql2);
    }

    
    
    $_SESSION['mensagem'] = "Deletado com Sucesso";
    header("Location: ../{$arq}.php");
}


?>