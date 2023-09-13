<?php

    $dir1 = "pasta1";
    $dir2 = "pasta2";

    if(!is_dir($dir1))
        mkdir($dir1);

    if(!is_dir($dir2))
        mkdir($dir2);

    $filename = "LEIAME.txt";

    if(!file_exists($dir1 . DIRECTORY_SEPARATOR . $filename)) {
        $file = fopen($dir1 . DIRECTORY_SEPARATOR . $filename, "w+");
        fwrite($file, date("Y-m-d H:i:s"));
        fclose($file);
    }

    //origem, destino - move pasta
    /*rename($dir1 . DIRECTORY_SEPARATOR . $filename, $dir2 . DIRECTORY_SEPARATOR . $filename);
    echo "Arquivo movido com sucesso!";*/

    rename($dir1 . DIRECTORY_SEPARATOR . $filename, $dir2 . DIRECTORY_SEPARATOR . "matheus.txt");
?>