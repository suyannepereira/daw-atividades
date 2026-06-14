//Lê "perguntas.txt" e depois devolve: json_encode($perguntas)

<?php

header("Content-Type: application/json");

$linhas =
file(
    "perguntas.txt",
    FILE_IGNORE_NEW_LINES
);

$perguntas = [];

foreach($linhas as $i => $linha){

    if($i == 0){
        continue;
    }

    $dados =
    explode(";",$linha);

    $perguntas[] = [

        "id" => $dados[0],

        "pergunta" => $dados[1],

        "tipo" => $dados[2],

        "respostas" => $dados[3]

    ];
}

echo json_encode($perguntas);