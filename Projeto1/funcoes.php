<?php

function conectarBD()
{
    try {
        $pdo = new PDO("mysql:host=143.106.241.3;dbname=cl201282;charset=utf8", "cl201282", "cl*23022006");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        $output = 'Impossível conectar ao Banco de Dados: ' . $e . '<br>';
        echo $output;
    }
}

function verificaCadastro($cod, $pdo)
{
    $stmt = $pdo->prepare("SELECT * FROM minas WHERE cod = :cod");
    $stmt->bindParam(":cod", $cod);
    $stmt->execute();

    $rows = $stmt->rowCount();
    return $rows;
}

function cadastra($cod, $nome, $posicao, $foto)
{
    try {
        $pdo = conectarBD();
        $rows = verificaCadastro($cod, $pdo);

        if ($rows <= 0) {
            if ($foto['name'] == "") {
                $fotoBinario = null;
            } else {
                $fotoBinario = file_get_contents($foto['tmp_name']);
            }

            $stmt = $pdo->prepare("INSERT INTO minas (cod, nome, posicao, foto) VALUES(:cod, :nome, :posicao, :foto)");
            $stmt->bindParam(":cod", $cod);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":posicao", $posicao);
            $stmt->bindParam(":foto", $fotoBinario);
            $stmt->execute();

            echo "<div class='container2'><span id='sucess'>Jogadora cadastrada!</span></div>";
        } else {
            echo "<div class='container2'<span id='error'>Jogadora já cadastrada!</span></div>";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function consulta()
{
    $pdo = conectarBD();
    if (isset($_POST["cod"]) && ($_POST["cod"] != "")) {
        $cod = $_POST["cod"];
        $stmt = $pdo->prepare("SELECT * FROM minas WHERE cod = :cod ORDER BY posicao, nome");
        $stmt->bindParam(":cod", $cod);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM minas ORDER BY posicao, nome");
    }

    $stmt->execute();
    return $stmt;
}

function buscaEdicao($cod)
{
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM minas WHERE cod = :cod");
    $stmt->bindParam(":cod", $cod);
    $stmt->execute();
    return $stmt;
}

function altera($cod, $novoNome, $novaPosicao, $novaFoto)
{
    $pdo = conectarBD();
    $nomeFoto = isset($novaFoto['name']);
    $tipoFoto = isset($novaFoto['type']);
    $tamanhoFoto = isset($novaFoto['size']);
    if ($nomeFoto != "") {
        $fotoBinario = file_get_contents($novaFoto['tmp_name']);
        $stmt = $pdo->prepare("UPDATE minas SET nome = :novoNome, posicao = :novaPosicao, foto = :novaFoto WHERE cod = :cod");
        $stmt->bindParam(":novoNome", $novoNome);
        $stmt->bindParam(":novaPosicao", $novaPosicao);
        $stmt->bindParam(":novaFoto", $fotoBinario);
        $stmt->bindParam(":cod", $cod);
    } else {
        $stmt = $pdo->prepare("UPDATE minas SET nome = :novoNome, posicao = :novaPosicao WHERE cod = :cod");
        $stmt->bindParam(":novoNome", $novoNome);
        $stmt->bindParam(":novaPosicao", $novaPosicao);
        $stmt->bindParam(":cod", $cod);
    }

    try {
        $stmt->execute();
        echo "<span>Jogadora alterada com sucesso!</span>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $pdo = null;
}
function excluir($cod)
{
    try {
        $pdo = conectarBD();
        $stmt = $pdo->prepare("DELETE FROM minas WHERE cod = :cod");
        $stmt->bindParam(":cod", $cod);
        $stmt->execute();

        echo "<span>" . $stmt->rowCount() . " Jogadora removida!</span>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>