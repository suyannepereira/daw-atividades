//Funciona igual ao login, mas a diferença é: Envia os dados para "salvar_cadastro.php"

document
.getElementById("formCadastro")
var dados = {

    email:
    document.getElementById("email").value,

    senha:
    document.getElementById("senha").value,

    admin:
    document.getElementById("admin").checked

};

fetch(
    "salvar_cadastro.php",
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
            "Cadastro realizado"
        );

        window.location.href =
        "login.html";

    }else{

        alert(
            resultado.mensagem
        );

    }

});