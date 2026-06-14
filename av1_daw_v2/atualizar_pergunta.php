<?php

header("Content-Type: application/json");

$dados =
json_decode(
    file_get_contents("php://input"),
    true
);

$id =
$dados["id"];

$pergunta =
$dados["pergunta"];

$tipo =
$dados["tipo"];

$respostas =
$dados["alternativa1"] . "|" .
$dados["alternativa2"] . "|" .
$dados["alternativa3"] . "|" .
$dados["alternativa4"] . "|" .
$dados["alternativa5"];

$linhas =
file("perguntas.txt");

foreach($linhas as $i => $linha){

    if($i == 0){
        continue;
    }

    $campos =
    explode(
        ";",
        trim($linha)
    );

    if($campos[0] == $id){

        $linhas[$i] =
        $id . ";" .
        $pergunta . ";" .
        $tipo . ";" .
        $respostas . "\n";

    }

}

file_put_contents(
    "perguntas.txt",
    implode("",$linhas)
);

echo json_encode([
    "sucesso" => true
]);