//Recebe os dados e cria uma linha na horizontal: 1;Qual a capital?;multipla;Rio|São Paulo|Brasília

<?php

header("Content-Type: application/json");

$dados =
json_decode(
    file_get_contents("php://input"),
    true
);

$pergunta =
$dados["pergunta"] ?? "";

$tipo =
$dados["tipo"] ?? "";

$alt1 =
$dados["alternativa1"] ?? "";

$alt2 =
$dados["alternativa2"] ?? "";

$alt3 =
$dados["alternativa3"] ?? "";

$alt4 =
$dados["alternativa4"] ?? "";

$alt5 =
$dados["alternativa5"] ?? "";

$arquivoNome =
"perguntas.txt";

$linhas =
file(
    $arquivoNome,
    FILE_IGNORE_NEW_LINES
);

$novoId =
count($linhas);

if($tipo == "multipla"){

    $respostas =           //junta as alternativas usando o caractere: |
        $alt1 . "|" .
        $alt2 . "|" .
        $alt3 . "|" .
        $alt4 . "|" .
        $alt5;

}else{

    $respostas = "";

}

$novaLinha =
$novoId . ";" .
$pergunta . ";" .
$tipo . ";" .
$respostas . "\n";

$arquivo =
fopen(
    $arquivoNome,
    "a"
);

fwrite(
    $arquivo,
    $novaLinha
);

fclose($arquivo);

echo json_encode([
    "sucesso" => true
]);