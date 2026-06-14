var parametros =
new URLSearchParams(
    window.location.search
);

var numeroQuestao =
parametros.get("id");

if(numeroQuestao == null){

    numeroQuestao = 1;

}

carregarQuestao(numeroQuestao);

function carregarQuestao(numero){

    fetch(
        "carregar_pergunta.php?id=" + numero
    )
    .then(function(resposta){

        return resposta.json();

    })
    .then(function(dados){

        if(!dados.existe){

            window.location.href =
            "listar_respostas.html";

            return;

        }

        document.getElementById("titulo")
        .innerHTML =
        "Questão " + dados.id;

        document.getElementById("pergunta")
        .innerHTML =
        dados.pergunta;

        var area =
        document.getElementById(
            "alternativas"
        );

        area.innerHTML = "";

        if(dados.tipo == "texto"){

            area.innerHTML =
            "<textarea id='respostaTexto' rows='5' cols='50'></textarea>";

        }else{

            var alternativas =
            dados.respostas.split("|");

            var letras =
            ["A","B","C","D","E"];

            for(
                var i = 0;
                i < alternativas.length;
                i++
            ){

                if(alternativas[i] != ""){

                    area.innerHTML +=

                    "<input type='radio' name='resposta' value='" +
                    letras[i] +
                    "'>" +

                    letras[i] +
                    ") " +

                    alternativas[i] +

                    "<br>";

                }

            }

        }

    });

}

document
.getElementById("formResposta")
.addEventListener(
    "submit",
    function(e){

        e.preventDefault();

        var resposta = "";

        var texto =
        document.getElementById(
            "respostaTexto"
        );

        if(texto){

            resposta =
            texto.value;

        }else{

            var opcao =
            document.querySelector(
                "input[name='resposta']:checked"
            );

            if(opcao){

                resposta =
                opcao.value;

            }

        }

        fetch(
            "salvar_resposta.php",
            {

                method:"POST",

                headers:{
                    "Content-Type":
                    "application/json"
                },

                body:
                JSON.stringify({

                    id_pergunta:
                    numeroQuestao,

                    resposta:
                    resposta

                })

            }
        )
        .then(function(resposta){

            return resposta.json();

        })
        .then(function(){

            numeroQuestao++;

            carregarQuestao(
                numeroQuestao
            );

        });

    }
);