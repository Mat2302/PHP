<?php
    //criação de arquivo
    mkdir('.teste1/', 0777); //Permissão padrão é 0777, que significa o acesso mais abrangente possível

    echo "Pasta teste 1 criada";

    mkdir('./teste2/teste3', 0777, true); //recursive=true permite criar uma pasta dentro da outra

    echo "Pasta teste 2 criada";

    //chmod('./teste1', 0660);

?>