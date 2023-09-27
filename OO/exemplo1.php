<?php

class Pessoa {
    public $nome; //atributo
    public function falar() { //metodo
        return "O meu nome é " . $this->nome;
    }
}

//criando instância
$pessoa = new Pessoa();
$pessoa->nome = "Simone"; //$_POST["nome"]
echo $pessoa->falar();

?>