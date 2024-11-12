<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #333;
            color: black;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-content: center;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            text-align: center;
            color: #333;
        }

        #formulario {
            margin-top: 15%;
            display: flexbox;
            align-self: center;
            justify-self: center;
            z-index: 1;
            /* Formulário acima do fundo */
            width: 20%;
            background: rgba(255, 255, 255);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            height: 20%;
        }

        table {
            width: 100%;
            height: 100%;
        }

        td {
            padding: 2px;
            vertical-align: middle;
            /* Alinha verticalmente o conteúdo */
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        select {
            border-radius: 10px;
            padding: 5px;
            width: 100%;
            /* Faz com que o input ocupe toda a largura da célula */
            box-sizing: border-box;
            /* Inclui o padding na largura total */
            border: 1px solid grey;
        }

        input[type="password"],
        select {
            border-radius: 10px;
            padding: 5px;
            width: 100%;
            /* Faz com que o input ocupe toda a largura da célula */
            box-sizing: border-box;
            /* Inclui o padding na largura total */
            border: 1px solid grey;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: rgb(255, 255, 255);
            background: linear-gradient(0deg, rgb(29, 145, 177) 0%, rgb(92, 72, 203) 100%);
            border-color: rgba(240, 248, 255, 0.765);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 5%;
        }

        input[type="submit"]:hover {
            background: rgb(34, 193, 195);
            background: linear-gradient(0deg, rgb(18, 109, 134) 0%, rgb(44, 28, 134) 100%);
            border-color: rgba(240, 248, 255, 0.765);
        }
    </style>
</head>

<body>
    <div id="formulario">
        <form action="acesso.php" method="post" target="_self">
            <table>
                <tr>
                    <td><label for="login"><b>Usuario</b></label></td>
                </tr><tr>
                    <td><input type="text" name="login" /></td>
                </tr>
                <tr>
                    <td><label for="senha"><b>Senha</b></label></td>
                </tr><tr>
                    <td><input type="password" name="senha" /></td>
                </tr>
                <tr>
                    <td><input type="submit" name="entrar" value="Entrar" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
