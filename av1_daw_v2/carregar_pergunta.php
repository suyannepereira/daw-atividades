<?php

header("Content-Type: application/json");

$id = $_GET["id"];

$linhas =
file(
    "perguntas.txt",
    FILE_IGNORE_NEW_LINES
);

foreach($linhas as $i => $linha){

    if($i == 0){
        continue;
    }

    $dados =
    explode(";",$linha);

    if($dados[0] == $id){

        echo json_encode([
            "existe" => true,
            "id" => $dados[0],
            "pergunta" => $dados[1],
            "tipo" => $dados[2],
            "respostas" => $dados[3]
        ]);

        exit;
    }

}

echo json_encode([
    "existe" => false
]);