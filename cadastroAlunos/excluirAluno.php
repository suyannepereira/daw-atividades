<?php

// 1. Verifica se recebeu o ID
if (!isset($_GET['id'])) {
    echo "ID não informado";
    exit;
}

$id = $_GET['id'];

// 2. Lê o arquivo
$linhas = file("alunos.txt");

$novoConteudo = "";
$encontrou = false;

// 3. Percorre todas as linhas
foreach ($linhas as $linha) {
    $dados = explode(";", trim($linha));

    // Se NÃO for o aluno que queremos excluir → mantém
    if ($dados[0] != $id) {
        $novoConteudo .= $linha;
    } else {
        $encontrou = true;
    }
}

// 4. Verifica se encontrou
if (!$encontrou) {
    echo "Aluno não encontrado";
    exit;
}

// 5. Salva o novo arquivo (sem o aluno)
file_put_contents("alunos.txt", $novoConteudo);

// 6. Volta para o index
header("Location: index.php");
exit;

?>