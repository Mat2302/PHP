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

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin: 0 auto;
        }

        button[type="submit"] {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        img {
            width: 15%;
            height: 15%;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover {
            background-color: #696865;
            color: white;
        }

        button[type="submit"]:hover {
            background-color: #696865;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #ccc;
            font-family: Calibri, sans-serif;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #edebe6;
        }

        tr:hover {
            background-color: #ccc;
        }

        .container,
        .container2 {
                max-width: 40%;
                max-height: 45%;
                background-color: white;
                margin: auto;
                padding: 20px;
                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05);
                margin-bottom: -10px;
            }

        ::placeholder {
            margin: 0 auto;
            color: #94928d;
        }
    </style>
</head>

<body>
    <a href="index.html">Home</a>
    <hr>

    <div class="container">
        <form method="post">
            <img src="img/minasLogo.png">
            <h2>Consulta de Jogadoras</h2>

            <input type="text" name="cod" placeholder="Código"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br><br>

            <input type="submit" value="Consultar">
            <hr>
        </form>
    </div>
</body>

</html>

<?php

include("funcoes.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    try {
        $stmt = consulta();
        echo "<div class='container2'>";
        echo "<form method='post' enctype='multipart/form-data'><table border='1px'>";
        echo "<tr><th></th><th>Código</th><th>Nome</th><th>Posição</th><th>Foto</th>";

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td><input type='radio' name='cod' 
            value='" . $row['cod'] . "'>";
            echo "<td>" . $row['cod'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['posicao'] . "</td>";
            if ($row['foto'] == null) {
                echo "<td align='center'><img src='img/user.png' width='50px' height='50px'></td>";
            } else {
                echo "<td align='center'><img src='data:image;base64," . base64_encode($row['foto']) . "' name='foto' width='50px' height='50px'></td>";
            }
            echo "</tr>";
            echo "</tr>";
        }

        echo "</table><br>
        
            <button type='submit' formaction='remove.php'>Excluir Jogadora</button>
            <button type='submit' formaction='edicao.php'>Editar Jogadora</button>

            </form></div>";

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>