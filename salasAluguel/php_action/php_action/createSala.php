<?php
session_start();
require_once 'db_connect.php';

function clear($input){
   global $connect;

   $var = mysqli_escape_string($connect, $input);
   $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrarSala'])){

    $array = $_POST;
    $cont = 0;
    $arrayNew[] = '';
    foreach ($array as $key => $value) {
        if((strcmp ( $key, 'nome') != 0) && (strcmp ( $key, 'capacidade') != 0)&& (strcmp ( $key, 'btn-cadastrarSala') != 0)){
            echo $key;
            $arrayNew[$cont] = $key;
            echo $cont++;
        }

    }
var_dump($arrayNew);exit;
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