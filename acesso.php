<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <script>
        function sucesso() {
            setTimeout("window.location='home.php'", 2000);
        }
        function failed() {
            setTimeout("window.location='aviso.html'", 2000);
        }
    </script>
    <style>
        body {
            overflow: hidden;
            background-color: #333;
            color: white;
            display: flex;
            justify-content: center;
        }

        .c-loader {
            margin-top: 20%;
            animation: is-rotating 1s infinite;
            border: 6px solid #e5e5e584;
            border-radius: 50%;
            border-top-color: #ffffff;
            height: 50px;
            width: 50px;
        }

        @keyframes is-rotating {
            to {
                transform: rotate(4turn);
            }
        }
    </style>
</head>

<body>
    <div class="c-loader">
        <?php
    include_once("conexao.php");
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $consulta = mysqli_query($conexao, "SELECT Permissao FROM Usuario WHERE login = '$login' AND senha = '$senha'") or die(mysqli_error($conexao));
    while ($linha = mysqli_fetch_array($consulta)) {
        $nivel = $linha["Permissao"];
    }
    $linhas = mysqli_num_rows($consulta);
    if ($linhas == 0) {
        echo "<script language='javascript'>failed()</script>";
    } else {
        $_SESSION["usuario"] = $_POST["login"];
        $_SESSION["password"] = $_POST["senha"];
        $_SESSION["nivel"] = $nivel;
        echo "<script language='javascript'>sucesso()</script>";
    }
    ?>
    </div>
</body>

</html>
