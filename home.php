<?php
session_start();
// if($_SESSION["nivel"] != "admin"){

// }
?>
<html>

<head>
    <meta charset="utf-8" />
    <title>Untitled Document</title>
    <style type="text/css">
        * {
            margin: 0%;
            padding: 0%;
        }

        body {
            height: 100%;
            overflow: hidden;
            background-color: #333;
        }

        li {
            list-style: none;
            padding: 10px;
        }

        a {
            color: rgb(255, 255, 255);
            font-size: 1.5em;
            text-decoration: none;
            padding: 10px;
        }

        a:hover {
            font-size: 1.5em;
            text-decoration: none;
            padding: 10px;
        }

        #conteudo {
            width: 100%;
            height: 100%;
            display: flex;
        }
        
        #menu {
            height: 100%;
            width: 20%;
            /* background: #444;    */
            justify-content: center;
            display: flexbox;
            background-color: #2b2828d3;

            ul{
                margin-top: 5%;
            }

            button {
                width: 270px;
                height: 50px;
                border-radius: 15px;
                background: rgba(141, 160, 212, 0.849);
                border: 0px;
                box-shadow: 0px 0px 10px 5px rgba(7, 49, 63, 0.166);
                text-align: left 0px;
            }
            button:hover {
            background: rgba(174, 193, 236, 0.849);
        }
        }

        #frame {
            width: 85%;
            height: 100%;
            border: 0px solid rgba(159, 13, 96, 0.701);
        }

        #titulo {
            padding: 20px;
            left: 0%;
            width: 100%;
            background-color: rgb(226, 241, 245);

            p {
                font-size: 30px;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                color: rgba(16, 45, 99, 0.864);
                text-align: center;

            }

            box-shadow: 0px 0px 10px 2px rgba(10, 9, 61, 0.166);
        }

        button a {
            display: block;
        }

        #eff {
            transition: transform 0.2s ease-out;
        }
    </style>
    <script language="JavaScript">
        // Script para esconder o código da página
        function protegercodigo() {
            if (event.button == 2 || event.button == 3) {
                alert('Indisponivel');
            }
        }
        document.onmousedown = protegercodigo
    </script>
    <script type="text/javascript">
        function noBack() { window.history.forward() }
        noBack();
        window.onload = noBack;
        window.onpageshow = function (evt) { if (evt.persisted) noBack() }
        window.onunload = function () { void (0) }
    </script>
</head>

<body>
<div id="conteudo">
    <?php
    if($_SESSION["nivel"] == "admin"){
    echo '<div id="menu">
            <ul>
                <li><button onmouseover="grow(this)" onmouseout="shrink(this)" id="eff"><a href="Cadastro_produto.php" target="conteudo">Cadastrar produto</a></button> </li>
                <li><button onmouseover="grow(this)" onmouseout="shrink(this)" id="eff"><a href="movimentacao.php" target="conteudo">Movimentar Produto</a></button></li>
            </ul>
    </div>';
    } else {
    echo '<div id="menu">
    <p>Voce não tem acesso ao menu</p> 
    </div>';
    }
    ?>
        <iframe name="conteudo" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>
</div>
    <script>
        function grow(element) {
            element.style.transform = "scale(1.1)"
        }

        function shrink(element) {
            element.style.transform = "scale(1)"
        }
    </script>
</body>

</html>
