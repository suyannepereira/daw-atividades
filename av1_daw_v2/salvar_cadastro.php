/*Responsável por:
-Receber os dados enviados pelo JavaScript.
-Verificar se o e-mail já está cadastrado.
-Definir o próximo ID.
-Salvar o novo usuário em usuarios.txt.
-Retornar um JSON informando se o cadastro deu certo ou não.*/ 

<?php

header("Content-Type: application/json");

$dados =
json_decode(
    file_get_contents("php://input"), //Lê o JSON enviado pelo JavaScript e transforma em um array PHP
    true
);

$email =
$dados["email"] ?? ""; //Pega o e-mail enviado
//O ?? "" serve para evitar um erro caso o campo não exista

$senha =
$dados["senha"] ?? "";

$admin =
$dados["admin"] ?? false;

$arquivoNome =
"usuarios.txt";

$arquivo =
fopen($arquivoNome,"r"); //Abre o arquivo "usuarios.txt" para a leitura

$existe = false;

while(($linha = fgets($arquivo)) !== false){ //Lê o arquivo linha por linha

    $linha = trim($linha);

    $campos =
    explode(";",$linha); //Divide a linha usando ";"

    if(count($campos) < 4){
        continue;
    }

    if($campos[1] == $email){ //Verifica se o e-mail digitado já existe no arquivo

        $existe = true;
        break;

    }

}

fclose($arquivo);

if($existe){

    echo json_encode([
        "sucesso" => false,
        "mensagem" =>
        "Usuário já cadastrado"
    ]);

    exit;
}

$linhas =
file(
    $arquivoNome,
    FILE_IGNORE_NEW_LINES    //Lê todas as linhas do arquivo e guarda em um vetor
);

$novoId =
count($linhas); //Conta quantas linhas existem no arquivo

$textoAdmin =
$admin ? "sim" : "nao"; //equivale a "sim" e "não"

//Monta a linha que será gravada
$novoUsuario =
$novoId .
";" .
$email .
";" .
$senha .
";" .
$textoAdmin .
"\n";

$arquivo =
fopen(
    $arquivoNome,
    "a"
);

fwrite(     //Grava uma nova linha no arquivo
    $arquivo,
    $novoUsuario
);

fclose($arquivo);

echo json_encode([   //Envia uma resposta para o JavaScript informando que o cadastro foi realizado com sucesso
    "sucesso" => true
]);