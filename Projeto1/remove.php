<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Minas Tênis Clube</title>
    <style>
        body {
            font-family: Calibri, sans-serif;
            background-color: #edebe6;
            margin-left: 5px;
        }

        a {
            margin-bottom: 15px;
        }

        h2 {
            text-align: center;
            margin-top: 7px;
        }

        img {
            width: 15%;
            height: 15%;
            display: block;
            margin: 0 auto;
        }

        span {
            justify-content: center;
            display: flex;
        }

        .container {
            max-width: 40%;
            max-height: 45%;
            background-color: white;
            margin: auto;
            padding: 20px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: -10px;
        }
    </style>
</head>

<body>

    <a href="index.html">Home</a> | <a href="consulta.php">Consulta</a>
    <hr>
</body>

</html>

<?php

include("funcoes.php");

if (!isset($_POST["cod"])) {
    echo "<div class='container'>
    <img src='img/minasLogo.png'>
    <h2>Exclusão de Jogadoras</h2>";
    echo "<span>Selecione uma jogadora a ser excluída na página de Consulta.</span>";
} else {
    $cod = $_POST["cod"];
    echo "<div class='container'>
    <img src='img/minasLogo.png'>
    <h2>Exclusão de Jogadoras</h2>";
    excluir($cod);
}

?>