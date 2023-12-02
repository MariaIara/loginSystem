<?php 

    session_start();

    include('config.php');

    if(isset($_POST['email']) || isset($_POST['senha'])){

        $email = $connect->real_escape_string($_POST['email']);
        $senha = $connect->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $connect->query($sql_code) or die("Falha na execução do código SQL: " . $connect->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            echo "LOGIN FEITO!!!";

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, cyan, blue);
        }

        .login{

            background-color: rgba(250, 250, 250, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color:#000;
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

        .h{
            display: flex;
            padding-left: 5px;      
        }

        h3{
            padding: 7px;
        }

        .new-user{
            background-color: #4f8fcf;
            border: none;
            padding: 8px;
            width: 100%;
            border-radius: 15px;
            color: white;
        }

        /* .new-user:hover{
            background-color: #2e5ca0;
            cursor: pointer;
        } */

        .old{
            padding-top: 12px;
        }
        
    </style>
</head>
<body>
    <div class="login">
        <div class="h">
            <h3 class="old">
                LOGIN
            </h3>
            <h3>
                <a href="form-cadastro.php">
                    <button class="new-user">CADASTRE-SE</button>
                </a>
            </h3>
        </div>
            <form action="form-login.php" method="POST">
                <input type="email" name="email" placeholder="E-mail" required>
                <br><br>
                <input type="password" name="senha" placeholder="Senha" required>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </form>
    </div>
</body>
</html>