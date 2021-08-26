<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estudante</title>
</head>
<body>
    <h1>Cadastro de Estudante</h1>
    <?php
    require './Pessoa.php';
    require './Estudante.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if(!empty($formData)){
        $estudante = new Estudante($formData['email']);
        $cadastro = $estudante->criarEstudante($formData);
        if ($cadastro) {
            echo "Estudante Cadastrado com Sucesso! ";
        } else {
            echo "Problema ao cadastrar Estudante";
        }
    }

    ?>


    <form name="CadastroEstudante" action="" method="POST"></form>
    <P>
        <label>Nome</label>
        <input type="text" name="nome" require>
    </P>
    <P>
        <label>Telefone</label>
        <input type="text" name="telefone" require>
    </P>
    <P>
        <label>Email</label>
        <input type="text" name="email" require>
    </P>
    <P>
        <label>Data Nascimento</label>
        <input type="text" name="data_nascimento" require>
    </P>
    <P>
        <label>Matricula</label>
        <input type="text" name="matricula" require>
    </P>
    <input type="submit" value="Cadastrar" name="cadastrarEstudante">
</body>
</html>