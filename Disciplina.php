<?php

class Disciplina
{
    public string $nome;
    private string $codigo;
    public int $creditos;
    public static $ministrada;

    public static function ministrarDisciplina()
    {
        self::$ministrada++;
    }

    public function verDisciplina()
    {
        return "{$this->nome} ({$this->codigo}) - {$this->creditos} créditos - " . self::$ministrada;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }


    public function setCodigo(string $codigoDisciplina)
    {
        if (strlen($codigoDisciplina) >= 3) {
            $this->codigo = $codigoDisciplina;
        } else {
            $this->codigo = 0;
        }
    }
}
