<?php
session_start();
require_once 'db_connect.php';

function clear($input){
   global $connect;

   $var = mysqli_escape_string($connect, $input);
   $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrar'])){
$especialidade = clear($_POST['especialidade']);

$sql = "INSERT INTO especialidade VALUES ('$especialidade')";

if(mysqli_query($connect, $sql)){
    $_SESSION['mensagem'] = "Especialidade cadastrada com sucesso";
header('Location: ../index.php');
} else {
    $_SESSION['mensagem'] = "erro ao cadastrar";
    header('Location: ../index.php');
}

}

?>