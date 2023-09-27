<?php

class Aluno
{
    private $ra;
    private $nome;
    private $curso;

    public function getRa()
    {
        return $this->ra;
    }

    public function setRa($ra)
    {
        $this->ra = $ra;
    }

    public function getNome(): String
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCurso()
    {
        return $this->curso;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    public function exibir()
    {
        //return array("modelo" => $this->getModelo(), "motor" => $this->getMotor(), "ano" => $this->getAno());

        echo "RA: " . $this->getRa() . "<br>
        Nome: " . $this->getNome() . "<br>
        Curso: " . $this->getCurso();
    }
}
?>