<?php

$homepage = file_get_contents('http://www.cotil.unicamp.br');

//echo $homepage;

$filename = fopen("siteCotil.html", "w+");
fwrite($filename, $homepage);
fclose($filename);

echo "Arquivo criado com sucesso!";

?>