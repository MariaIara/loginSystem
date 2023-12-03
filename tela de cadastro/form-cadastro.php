<?php 

    include_once('config.php');

    if(isset($_POST['submit'])){

        // print_r("Nome completo: " . $_POST['nome']);
        // print "<br>";
        // print_r("Email: " . $_POST['email']);
        // print "<br>";
        // print_r("Senha: " . $_POST['senha']);

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($connect, "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')");
        header("Location: ./form-login.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, cyan, blue);
        }

        .cadastro{
            background-color: rgba(250, 250, 250, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color:#000;
        }

        h3{
            padding: 7px;
        }

        .h{
            display: flex;
        }

        .old{
            background-color: #4f8fcf;
            border: none;
            padding: 10px;
            border-radius: 15px;
            color: white;
        }

        .old:hover{
            background-color: #2e5ca0;
            cursor: pointer;
        }

        .new-user{
            background-color: #bfcbd7;
            border: none;
            padding: 10px;
            border-radius: 15px;
            margin-bottom: 10px;
        }

        .new-user:hover{
            background-color: #b0b9c1;
            cursor: pointer;
        }

        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        #submit{
            background-color: #1a1919;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color:white;
            font-size: 15px;
        }

        #submit:hover{
            background-color: #2f2d2d;
            cursor: pointer;
        }
        
    </style>
</head>
<body>
    <div class="cadastro">
        <div class="h">
            <h3>
                <button class="new-user">CADASTRE-SE</button>
            </h3>
            <h3>
                <a href="form-login.php">
                    <button class="old">LOGIN</button>
                </a>
            </h3>
        </div>
        <form action="form-cadastro.php" method="POST">
            <div class="inputs">
                <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome completo" required>
                <br><br>
                <input type="email" name="email" id="email" class="inputUser" placeholder="E-mail" required>
                <br><br>
                <input type="password" name="senha" id="senha" calss="inputUser" placeholder="Senha" required>
                <br><br>
                <!-- <input type="password" nome="senha" id="senha" calss="inputUser" placeholder="Confirmar Senha">
                <br><br> -->
                <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>
</body>
</html>