<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>

<a href="index.html">Home</a> | <a href="consulta.php">Consulta</a>
<hr>

<h2>Edição de Alunos</h2>

</body>
</html>

<?php

    include("conexaoBD.php");

    $ra = $_POST['ra'];
    $novoNome = $_POST['nome'];
    $novoCurso = $_POST['curso'];

    //Foto
    $novaFoto = $_FILES['foto'];
    $nomeFoto = $novaFoto['name'];
    $tipoFoto = $novaFoto['type'];
    $tamanhoFoto = $novaFoto['size'];

    if($nomeFoto != "") {
        //Lendo o conteúdo do arquivo para uma var
        $fotoBinario = file_get_contents($novaFoto['tmp_name']);
        $stmt = $pdo->prepare('UPDATE crud SET nome = :novoNome, curso = :novoCurso, foto = :novaFoto WHERE ra = :ra');
        $stmt->bindParam(":novoNome", $novoNome);
        $stmt->bindParam(":novoCurso", $novoCurso);
        $stmt->bindParam(":novaFoto", $fotoBinario);
        $stmt->bindParam(":ra", $ra);
    } else {
        $stmt = $pdo->prepare('UPDATE crud SET nome = :novoNome, curso = :novoCurso WHERE ra = :ra');
        $stmt->bindParam(':novoNome', $novoNome);
        $stmt->bindParam(':novoCurso', $novoCurso);
        $stmt->bindParam(':ra', $ra);
    }

    try {
        $stmt->execute();
        echo "Os dados do aluno de RA $ra foram alterados!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
?>