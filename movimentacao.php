<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <style>
        body {
            color: black;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            text-align: center;
            color: #333;
        }

        #formulario {
            z-index: 1; /* Formulário acima do fundo */
            width: 50%;
            margin: 100px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            height: 100%;
        }

        table {
            width: 100%;
            height: 100%;
        }

        td {
            padding: 8px;
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
        input[type="number"],
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
        }

        input[type="submit"]:hover {
            background: rgb(34, 193, 195);
            background: linear-gradient(0deg, rgb(18, 109, 134) 0%, rgb(44, 28, 134) 100%);
            border-color: rgba(240, 248, 255, 0.765);
        }
        </style>
</head>

<body>
 
    <h1>Movimentar estoque</h1>

    <div id="formulario">
        <form target="_self" method="post">
            <table>
                <tr>
                    <td>
                        <label for="produto"><b>Produto</b></label>
                    </td>
                    <td>
                    <select id="produto" name="produto">
                            <?php
                            include_once("conexao.php");
                            $consulta = mysqli_query($conexao, "SELECT Nome_produto, Cod_produto, Quantidade FROM Produto ORDER BY  Nome_produto");
                            
                            while ($linha = mysqli_fetch_array($consulta)) {
                                echo "<option value='". $linha["Cod_produto"]."'>Qnt: ".$linha["Quantidade"]." / ".$linha["Nome_produto"]."</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="modifica"><b>Quantidade</b></label>
                    </td>
                    <td>
                        <input type="number" id="modifica" name="modifica" required autocomplete="off" step="any" placeholder="Movimentar quantidade...">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Movimentar">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="php">   
    <?php
        include_once("conexao.php");
        if(isset($_POST['produto'])) {

            //mysqli_set_charset($conexao, 'utf-8');
            $nome = $_POST ["produto"];
            $consulta = mysqli_query($conexao, "SELECT Quantidade FROM Produto WHERE Cod_produto = '$nome'");
            $linha = mysqli_fetch_array($consulta);
            $quantidade =  $linha["Quantidade"] + $_POST ["modifica"];       
            
            $insere = "UPDATE Produto
            SET Quantidade = '$quantidade' 
            WHERE Cod_produto = '$nome'";
            $resultado = mysqli_query($conexao, $insere)
            or die(mysqli_error($conexao));
            echo "<table height = '90%' align = 'center' border = '0'><tr><td valign = 'middle' align = 'center'>
            <font size = '5' color= 'white'>Estoque modificado com sucesso!</font><br>";
        }
?>
    </div>
</body>

</html>
