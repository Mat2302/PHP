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

        select {
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

        .text {
            margin: 0 auto;
            color: #94928d;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .imgFile {
            max-width: 300px;
            max-height: 300px;
        }

        ::placeholder {
            margin: 0 auto;
            color: #94928d;
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

        .file-container {
            position: relative;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: inline-block;
            background-color: #fff;
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 25px;
        }

        .file-container input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
        }

        #sucess {
            color: green;
            font-weight: bold;
            justify-content: center;
            display: flex;
        }

        #warning {
            color: orange;
            font-weight: bold;
            justify-content: center;
            display: flex;
        }

        #error {
            color: red;
            font-weight: bold;
            justify-content: center;
            display: flex;
        }
    </style>
</head>

<body>
    <a href="index.html">Home</a>
    <hr>

    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <img src="img/minasLogo.png">
            <h2>Cadastro de Jogadoras</h2>

            <input type="text" name="cod" placeholder="Código"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');"><br><br>

            <input type="text" size="25" name="nome" placeholder="Nome"><br><br>

            <div class="file-container">
                <label class="text">Foto:</label><br>
                <input type="file" id="foto" name="foto" accept="image/jpeg, image/png, image/gif"
                    placeholder="Foto"><br><br>
                <div id="imagePreview"></div>

                <script>
                    document.getElementById('foto').addEventListener('change', function () {
                        var file = this.files[0];
                        var reader = new FileReader();

                        reader.onload = function () {
                            var imgC = document.createElement('img');
                            imgC.src = reader.result;
                            document.getElementById('imagePreview').innerHTML = "";
                            document.getElementById('imagePreview').appendChild(imgC);
                        }

                        reader.readAsDataURL(file);
                    });
                </script>
            </div>

            <select id="posicao" name="posicao">
                <option></option>
                <option value="Ponteira">Ponteira</option>
                <option value="Oposta">Oposta</option>
                <option value="Libero">Libero</option>
                <option value="Central">Central</option>
                <option value="Levantadora">Levantadora</option>
            </select><br><br>

            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>

</html>

<?php

include("funcoes.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

    $cod = $_POST["cod"];
    $nome = $_POST["nome"];
    $posicao = $_POST["posicao"];

    $foto = $_FILES['foto'];
    $nomeFoto = $foto['name'];
    $tipoFoto = $foto['type'];
    $tamanhoFoto = $foto['size'];

    if ((trim($cod) == "") || (trim($nome) == "") || (trim($posicao) == "")) {
        echo "<div class='container2'><span id='warning'>Os campos são obrigatórios!</span></div>";
    } else if (($nomeFoto != "") && (!preg_match('/^image\/(jpeg|png|gif)$/', $tipoFoto))) {
        echo "<div class='container2'><span id='error'>Não é uma imagem válida!</span></div>";
    } else if ($tamanhoFoto > TAMANHO_MAXIMO) {
        echo "<div class='container2'><span id='error'>A imagem deve possuir no máximo 2MB!</span></div>";
    } else {
        cadastra($cod, $nome, $posicao, $foto);
    }
}

?>