<?php
//conexão com banco de dados
$serverName = "localhost";
$userDB = "root";
$passwordDB = "";
$db_name = "s_salas";

$connect = mysqli_connect($serverName, $userDB, $passwordDB, $db_name);
mysqli_set_charset($connect,"utf8");
if(mysqli_connect_error()){
    die("Connection failed: " . mysqli_connect_error());
}

