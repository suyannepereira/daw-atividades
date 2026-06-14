//Responsável por pegar os dados do formulário e enviar para o PHP

document
.getElementById("formLogin")
document
.getElementById("formLogin") //procura o formulário pelo ID
.addEventListener(
    "submit",
    function(e){

        e.preventDefault();

        var dados = { //criam um "objeto" com os dados digitados

            email:
            document.getElementById("email").value,

            senha:
            document.getElementById("senha").value

        };

        fetch( //envia os dados para o PHP
            "validar_login.php",
            {

                method:"POST",

                headers:{
                    "Content-Type":
                    "application/json"
                },

                body:
                JSON.stringify(dados) //transforma o objeto JavaScript em JSON

            }
        )
        .then(function(resposta){

            return resposta.json(); //converte a resposta do PHP para um objeto JavaScript

        })
        .then(function(resultado){

            if(resultado.sucesso){

                if(resultado.admin){

                    window.location.href =
                    "menu.html";

                }else{

                    window.location.href =
                    "exibir_prova.html";

                }

            }else{

                alert(
                    resultado.mensagem
                );

            }

        });

    }
);