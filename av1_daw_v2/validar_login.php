//Recebe os dados enviados pelo JavaScript

<?php

header("Content-Type: application/json");

$dados =
json_decode(
    file_get_contents("php://input"), //lê o JSON enviado
    true
);

$email = $dados["email"] ?? "";
$senha = $dados["senha"] ?? "";

$arquivo = fopen("usuarios.txt","r");

$loginValido = false;
$admin = false;

while(($linha = fgets($arquivo)) !== false){

    $linha = trim($linha);

    $campos = explode(";",$linha);

    if(count($campos) < 4){
        continue;
    }

    $emailArquivo = trim($campos[1]);
    $senhaArquivo = trim($campos[2]);
    $adminArquivo = trim($campos[3]);

    if(
        $email == $emailArquivo
        &&
        $senha == $senhaArquivo
    ){

        $loginValido = true;

        if(
            strtolower($adminArquivo)
            == "sim"
        ){
            $admin = true;
        }

        break;
    }
}

fclose($arquivo);

if($loginValido){

    echo json_encode([ //transforma o JSON em um array PHP, depois ele:abre o arquivo usuarios.txt, procura email e senha, verifica se existe
        "sucesso" => true,
        "admin" => $admin
    ]);

}else{

    echo json_encode([    
        "sucesso" => false,
        "mensagem" => "Login inválido"
    ]);

}