<?php

    $cep = "13150037";
    $link = "https://viacep.com.br/ws/$cep/json/";

    $ch = curl_init($link);

    //setando opções da biblioteca
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //indica que espero um retorno
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //para não precisar validar https

    $response = curl_exec($ch);

    curl_close($ch);

    $dados = json_decode($response, true); //transforma o resultado json em um array

    //print_r($dados);

    echo $dados["logradouro"];
    echo "<br>";
    echo $dados["bairro"];

?>