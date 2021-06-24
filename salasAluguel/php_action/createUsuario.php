<?php
session_start();
require_once 'db_connect.php';

function clear($input){
   global $connect;

   $var = mysqli_escape_string($connect, $input);
   $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrarUsuario'])){
$nome = clear($_POST['nome']);
$cpf = clear($_POST['cpf']);
$email = clear($_POST['email']);

$sql = "INSERT INTO usuario (nome, cpf, email) VALUES ('$nome', '$cpf','$email',)";

if(mysqli_query($connect, $sql)){
    $_SESSION['mensagem'] = "Especialidade cadastrada com sucesso";
header('Location: ../index.php');
} else {
    $_SESSION['mensagem'] = "erro ao cadastrar";
    header('Location: ../index.php');
}

}

?>