<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPass = '';
    $db = 'formularios';

    $connect = new mysqli($dbHost, $dbUsername, $dbPass, $db);

    // if($connect->connect_errno){
    //     echo "erro";
    // }
    // else{
    //     echo "Deu certo!!!";
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
    }
?>