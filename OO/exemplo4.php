<?php

class Pessoa {
    public $nome = "Matheus";
    protected $idade = 18;
    private $senha = "123456";

    public function verDados() {
        echo get_class();
        echo $this->nome . "<br>";
        echo $this->idade . "<br>";
        echo $this->senha . "<br>";
    }
}

class Programador extends Pessoa {
    public function verDados() {
        echo "classe: ". get_class() . "<br>";
        echo $this->nome . "<br>";
        echo $this->idade . "<br>";
    }
}

$pessoa = new Programador();

$pessoa->verDados();

?>