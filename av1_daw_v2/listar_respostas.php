<?php

header("Content-Type: application/json");

$arquivo =
"respostas.txt";

if(!file_exists($arquivo)){

    echo json_encode([]);

    exit;

}

$linhas =
file(
    $arquivo,
    FILE_IGNORE_NEW_LINES
);

$respostas = [];

foreach($linhas as $i => $linha){

    if($i == 0){
        continue;
    }

    $dados =
    explode(";",$linha);

    $respostas[] = [

        "id_pergunta" =>
        $dados[0],

        "resposta" =>
        $dados[1]

    ];

}

echo json_encode(
    $respostas
);