<?php

header("Content-Type: application/json");

$dados =
json_decode(
    file_get_contents("php://input"),
    true
);

$id = $dados["id"];

$linhas =
file("perguntas.txt");

$novo = [];

foreach($linhas as $i => $linha){

    if($i == 0){

        $novo[] = $linha;
        continue;

    }

    $campos =
    explode(
        ";",
        trim($linha)
    );

    if($campos[0] != $id){

        $novo[] = $linha;

    }

}

file_put_contents(
    "perguntas.txt",
    implode("",$novo)
);

echo json_encode([
    "sucesso" => true
]);