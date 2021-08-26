<?php

class Estudante extends Pessoa
{

    public $matricula;
    public $ira;

    public function disciplinasMatriculadas()
    {
        return "PHP Orientado a Objetos";
    }

    public function atualizaIRA($nota)
    {
        $this->ira += $nota;

        return $this->ira;
    }

    public function verEstudante(): object
    {
        $conn = new Conn();
        $conectar = $conn->connect();

        $sql = "SELECT nome, telefone, email, data_nascimento, matricula, ira
                FROM estudante e
                LEFT JOIN pessoa p
                ON e.pessoa_id = p.ID 
                WHERE email = :email";

        $result = $conectar->prepare($sql);
        $result->execute(array(':email' => $this->email));
        return $result->fetchObject();
    }

    public function calculaAvaliacao()
    {
        $ira = 50;
        $porcentagemPresenca = 80;
        $resultado = $ira *   $porcentagemPresenca;
        return $resultado;
    }

    public function criarEstudante(array $estudante): bool
    {
        $conn = new Conn();
        $conectar = $conn->connect();

        $sql = "INSERT INTO pessoa (nome, telefone, email, data_nascimento)
                VALUES (:nome, :telefone, :email, :data_nascimento)";
        $result = $conectar->prepare($sql);
        $result->execute(array(
            ':nome' => $estudante['nome'],
            ':telefone' => $estudante['telefone'],
            ':email' => $estudante['email'],
            ':data_nascimento' => $estudante['data_nascimento']
        ));
        $idCriado = $conectar->lastInsertId();

        if ($idCriado) {
            $sql = "INSERT INTO estudante (pessoa_id, matricula)
                    VALUES (?, ?)";
            $result = $conectar->prepare($sql);
            $result->execute(array($idCriado, $estudante['matricula']));
            if ($result->rowCount()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function editarEstudante(array $estudante): bool
    {
        $conn = new Conn();
        $conectar = $conn->connect();

        $sql = "UPDATE pessoa
                SET nome=:nome, telefone=:telefone, email=:email, data_nascimento=:data_nascimento
                WHERE ID=:id";
        $result = $conectar->prepare($sql);
        $resultStatus = $result->execute(array(
            ':nome' => $estudante['nome'],
            ':telefone' => $estudante['telefone'],
            ':email' => $estudante['email'],
            ':data_nascimento' => $estudante['data_nascimento'],
            ':id' => $estudante['id'],
        ));
        if ($resultStatus) {
            $sql = "UPDATE estudante
                    SET matricula=:matricula
                    WHERE pessoa_id=:id";
            $result = $conectar->prepare($sql);
            $resultStatus = $result->execute(array(':matricula' => $estudante['matricula'], ':id' => $estudante['id']));

            if ($resultStatus) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
