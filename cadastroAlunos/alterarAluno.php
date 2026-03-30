<?php

if (!isset($_GET['id'])) {
    echo "ID não informado";
    exit;
}

$id = $_GET['id'];

$linhas = file("alunos.txt");
$alunoEncontrado = null;

// Buscar aluno
foreach ($linhas as $linha) {
    $dados = explode(";", trim($linha));

    if ($dados[0] == $id) {
        $alunoEncontrado = $dados;
        break;
    }
}

if ($alunoEncontrado == null) {
    echo "Aluno não encontrado";
    exit;
}

// Se clicou em salvar
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $novoNome = $_POST["nome"];
    $novoEmail = $_POST["email"];

    $novoConteudo = "";

    foreach ($linhas as $linha) {
        $dados = explode(";", trim($linha));

        if ($dados[0] == $id) {
            $linha = $id . ";" . $novoNome . ";" . $novoEmail . "\n";
        }

        $novoConteudo .= $linha;
    }

    file_put_contents("alunos.txt", $novoConteudo);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Alterar Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Alterar Aluno</h2>

    <form method="POST">

        Nome:<br>
        <input type="text" name="nome" value="<?php echo $alunoEncontrado[1]; ?>">

        Email:<br>
        <input type="text" name="email" value="<?php echo $alunoEncontrado[2]; ?>">

        <input type="submit" value="Salvar Alterações">

        <a href="index.php" class="voltar">Voltar</a>

    </form>
    
</div>



</body>
</html>