<?php
class Professor extends Pessoa
{
    public string $especialidade;
    public float $salario;

    public function verProfessor(): object
    {
        $conn = new Conn();
        $conectar = $conn->connect();

        $sql = "SELECT nome, telefone, email, especialidade, salario, data_nascimento
                FROM php_oo.professor o
                LEFT JOIN php_oo.pessoa p
                ON o.pessoa_id = p.ID
                WHERE email = :email";

        $result = $conectar->prepare($sql);
        $result->execute(array(':email' => $this->email));

        return $result->fetchObject();
    }

    public function calculaAvaliacao()
    {
        $qtdDisciplinas = 100;
        $qtdAnos = 12;
        $resultado = $qtdDisciplinas * $qtdAnos;
        return $resultado;
    }
}
