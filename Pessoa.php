<?php

require './Conn.php';

abstract class  Pessoa
{
    public int $id;
    public string $nome;
    public string $telefone;
    public string $email;
    public DateTime $dataNascimento;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function verDados(): object
    {
        $conn = new Conn();
        $conectar = $conn->connect();
        $sql = "SELECT nome, telefone, email
                FROM php_oo.pessoa
                WHERE id = :id";

        $result = $conectar->prepare($sql);
        $result->execute(array(':id' => $this->id));

        return $result->fetchObject();
    }

    public function calculaIdade($dataNascimento): int
    {
        $date = new DateTime($dataNascimento);
        $interval = $date->diff(new DateTime(date('Y-m-d')));
        return $interval->format('%Y');
    }

    abstract function calculaAvaliacao();
}
