<?php

header("Content-Type: application/json");

$dados =
json_decode(
    file_get_contents(
        "php://input"
    ),
    true
);

$id =
$dados["id_pergunta"];

$resposta =
$dados["resposta"];

$arquivo =
"respostas.txt";

if(
    !file_exists($arquivo)
){

    file_put_contents(
        $arquivo,
        "id_pergunta;resposta\n"
    );

}

$linhas =
file(
    $arquivo,
    FILE_IGNORE_NEW_LINES
);

$existe = false;

foreach($linhas as $i => $linha){

    if($i == 0){
        continue;
    }

    $campos =
    explode(";",$linha);

    if($campos[0] == $id){

        $linhas[$i] =
        $id .
        ";" .
        $resposta;

        $existe = true;

    }

}

if(!$existe){

    $linhas[] =
    $id .
    ";" .
    $resposta;

}

file_put_contents(
    $arquivo,
    implode("\n",$linhas)
);

echo json_encode([
    "sucesso" => true
]);