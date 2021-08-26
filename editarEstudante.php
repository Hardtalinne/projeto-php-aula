<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudante</title>
</head>

<body>
    <h1>Edição de estudante</h1>
    <?php
    require './Pessoa.php';
    require './Estudante.php';

    $estudante = new Estudante($_GET['email']);

    if (isset($_POST['editarEstudante'])) {
        $formData =  filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $estudante = new Estudante($formData['email']);
        $estudanteDados = $estudante->editarEstudante($formData);

        if ($estudanteDados) {
            echo "Estudante Editado com Sucesso!";
        } else {
            echo "Falha ao editar estudante";
        }
    } else {
        $estudanteDados = $estudante->verEstudante();
    ?>

        <form name="EdicaoEstudante" action="" method="POST">
            <input type="hidden" name="id" require value="<? $estudanteDados->iD ?>">
            <P>
                <label>Nome</label>
                <input type="text" name="nome" require value="<? $estudanteDados->nome ?>">
            </P>
            <P>
                <label>Telefone</label>
                <input type="text" name="telefone" require value="<? $estudanteDados->telefone ?>">
            </P>
            <P>
                <label>Email</label>
                <input type="text" name="email" require value="<? $estudanteDados->email ?>">
            </P>
            <P>
                <label>Data Nascimento</label>
                <input type="text" name="data_nascimento" require value="<? $estudanteDados->data_nascimento ?>">
            </P>
            <P>
                <label>Matricula</label>
                <input type="text" name="matricula" require value="<? $estudanteDados->matricula ?>">
            </P>
            <input type="submit" value="Editar" name="editarEstudante">
        </form>
    <?php
    }
    ?>
    <a href="index.php">Voltar</a>
</body>

</html>