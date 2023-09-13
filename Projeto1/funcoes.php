<?php

    function conectarBD() {
        $pdo = new PDO("mysql:host=localhost;dbname=cl201282;charset=utf8", "cl201282", "cl*23022006");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function cadastra($ra, $nome, $idade, $altura, $posicao, $foto) {

    }
?>