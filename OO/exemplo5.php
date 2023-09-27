<?php

class Endereco {
    private $logradouro;
    private $numero;
    private $cidade;

    public function __construct($logradouro, $numero, $cidade) {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cidade = $cidade;
    }

    public function __toString() {
        return $this->logradouro . "<br>" . $this->numero . "<br>" > $this->cidade . "<br>";
    }

    public function __destruct() {
        echo "destruir";
    }
}

$meuEndereco = new Endereco("Rua Paschoal Marmo", "1888", "Limeira");

echo $meuEndereco;

?>