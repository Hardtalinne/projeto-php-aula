<?php

class Conn
{
    public $username = 'admin';
    public $password = 'admin';
    public $dsn = "mysql:dbname=php_oo;host=172.23.40.246";
    public $connect = null;

    public function connect()
    {
        try {
            $this->connect = new PDO($this->dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            return $this->connect;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function listarProfessores(): array
    {
        $sql = "SELECT nome, telefone, email, especialidade, salario, data_nascimento
        FROM professor o 
        LEFT JOIN pessoa p
        ON o.pessoa_id = p.ID";

        $conectar = $this->connect();
        $result = $conectar->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }
}
