<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão acadêmica</title>
</head>

<body>
    <?php
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';
    require './Disciplina.php';

    ?>
    <br>
    <h2>Professores</h2>
    <?php

    $conexao = new Conn();
    $professores = $conexao->listarProfessores();
    foreach ($professores as $key => $value) {
        echo $value['nome'] . " " . "<a href='editarEstudante.php?email={$value['email']}'>Editar</a><br>";
    }
    ?>

    <br>
    <hr>

    <h2>Estudante</h2>
    <?php
    $estudante = new Estudante('paulo@paulo.com.br');
    $estudanteDados = $estudante->verEstudante();
    echo "Nome: {$estudanteDados->nome} <br>";
    echo "Telefone: {$estudanteDados->telefone} <br>";
    echo "Email: {$estudanteDados->email} <br>";
    echo "Matricula: {$estudanteDados->matricula} <br>";
    echo "IRA: {$estudanteDados->ira} <br>";
    echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br>";
    echo "Avaliação:  {$estudante->calculaAvaliacao()} <br>";
    ?>
    <br>
    <hr>

    <h2>Disciplinas</h2>
    <?php
    $disciplinaMatematica = new Disciplina();
    $disciplinaMatematica->nome = 'Matemática';
    $disciplinaMatematica->setCodigo('MAT');
    $disciplinaMatematica->creditos = 4;
    Disciplina::ministrarDisciplina();
    $matematica = $disciplinaMatematica->verDisciplina() . "<br>";
    echo $matematica . PHP_EOL;
    ?>
    <?php
    $disciplinaMatematica = new Disciplina();
    $disciplinaMatematica->nome = 'Portugues';
    $disciplinaMatematica->setCodigo('PORT');
    $disciplinaMatematica->creditos = 4;
    echo $matematica = $disciplinaMatematica->verDisciplina() . "<br>";
    Disciplina::ministrarDisciplina();
    echo $matematica = $disciplinaMatematica->verDisciplina();
    ?>
</body>

</html>