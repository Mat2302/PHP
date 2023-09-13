<?php

    $ra = $_POST["ra"];
    $nome = $_POST["nome"];
    $curso = $_POST["curso"];

    $filename = fopen("alunos.txt", "a+");

    $aluno = "RA: " . $ra . "\nNome: " . $nome . "\nCurso: " . $curso . "\n\n";

    fwrite($filename, $aluno);

    fclose($filename);

    echo "Cadastro efetuado com sucesso!";

?>