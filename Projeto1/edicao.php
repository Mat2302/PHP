<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        input[type="submit"]:hover {
            background-color: #696865;
            color: white;
        }

        select {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
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

        .text {
            margin: 0 auto;
            color: #94928d;
            font-size: 18px;
            margin-bottom: 10px;
        }

        ::placeholder {
            margin: 0 auto;
            color: #94928d;
        }
    </style>
</head>

<body>
    <a href="index.html">Home</a> |
    <a href="consulta.php">Consulta</a>
    <hr>
</body>

</html>

<?php

include("funcoes.php");

if (!isset($_POST["cod"])) {
    echo "<div class='container'>
    <img src='img/minasLogo.png'>
    <h2>Edição de Jogadoras</h2>";
    echo "<span>Selecione uma jogadora a ser editada na página de Consulta!</span>";
} else {
    $cod = $_POST["cod"];

    try {
        $stmt = buscaEdicao($cod);

        $ponteira = "";
        $oposta = "";
        $libero = "";
        $central = "";
        $levantadora = "";

        while ($row = $stmt->fetch()) {
            $foto = $row['foto'];
            if ($row['posicao'] == "Ponteira") {
                $ponteira = "selected";
            } else if ($row['posicao'] == "Oposta") {
                $oposta = "selected";
            } else if ($row['posicao'] == "Libero") {
                $libero = "selected";
            } else if ($row['posicao'] == "Central") {
                $central = "selected";
            } else if ($row['posicao'] == "Levantadora") {
                $levantadora = "selected";
            }

            echo "<div class='container'>\n
            <img src='img/minasLogo.png'>\n
            <h2>Edição de Jogadoras</h2>\n
            <form method='post' enctype='multipart/form-data' action='altera.php'>\n
            <input type='text' name='cod' value='$row[cod]' placeholder='Código'
                readonly><br><br>\n

            <input type='text' size='25' name='nome' value='$row[nome]' placeholder='Nome'><br><br>\n
            
            <label class='text'>Foto:</label><br>";

            if ($foto == "") {
                echo "<img src='img/user.png'><br><br>";
            } else {
                echo "<img src='data:image;base64," . base64_encode($foto) . "' width='50px' height='50px'><br><br>";
            }

            echo "
            <input type='file' name='foto'><br><br>
                        
            <select id='posicao' name='posicao'>\n
                <option></option>\n 
                <option value='Ponteira' $ponteira>Ponteira</option>\n
                <option value='Oposta' $oposta>Oposta</option>\n
                <option value='Libero' $libero>Libero</option>\n
                <option value='Central' $central>Central</option>\n
                <option value='Levantadora' $levantadora>Levantadora</option>\n
            </select>\n
            <input type='submit' value='Salvar Alterações'>\n
            <hr>\n
            </form>\n
            </div>";
        }
    } catch (PDOException $e) {
        echo 'Error ' . $e->getMessage();
    }
}

?>