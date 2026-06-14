//pega os dados do formulário e deois envia para "adicionar_pergunta.php"

document
.getElementById("formPergunta")
fetch(
    "adicionar_pergunta.php",
    {

        method:"POST",

        headers:{
            "Content-Type":
            "application/json"
        },

        body:
        JSON.stringify(dados)

    }
)
.then(function(resposta){

    return resposta.json();

})
.then(function(resultado){

    if(resultado.sucesso){

        alert(
            "Pergunta cadastrada"
        );

        document
        .getElementById("formPergunta")
        .reset();

    }

});