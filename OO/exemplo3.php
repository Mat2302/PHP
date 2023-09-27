<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de alunos</title>
</head>

<body>

    <a href="index.html">Home</a>
    <hr>

    <h2>Cadastro de Alunos</h2>
    <div>
        <form method="post" enctype="multipart/form-data">

            RA:<br>
            <input type="text" size="10" name="ra"><br><br>

            Nome:<br>
            <input type="text" size="30" name="nome"><br><br>

            Curso:<br>
            <select name="curso">
                <option></option>
                <option value="Edificações">Edificações</option>
                <option value="Enfermagem">Enfermagem</option>
                <option value="GeoCart">Geodésia e Cartografia</option>
                <option value="Informática">Informática</option>
                <option value="Mecânica">Mecânica</option>
                <option value="Qualidade">Qualidade</option>
            </select><br><br>

            <input type="submit" value="Cadastrar">

            <hr>

        </form>
    </div>

</body>

</html>

<?php

//inserindo dados
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    include("Aluno.php");

    $aluno = new Aluno();

    $aluno->setRa($_POST['ra']);
    $aluno->setNome($_POST['nome']);
    $aluno->setCurso($_POST['curso']);

    $aluno->exibir();
}
?>