var parametros =
new URLSearchParams(
    window.location.search
);

var id =
parametros.get("id");

fetch(
    "buscar_pergunta.php?id=" + id
)
.then(function(resposta){

    return resposta.json();

})
.then(function(pergunta){

    document.getElementById("id").value =
    pergunta.id;

    document.getElementById("pergunta").value =
    pergunta.pergunta;

    if(pergunta.tipo == "multipla"){

        document.querySelector(
            "input[value='multipla']"
        ).checked = true;

    }else{

        document.querySelector(
            "input[value='texto']"
        ).checked = true;

    }

    var alternativas =
    pergunta.respostas.split("|");

    document.getElementById("alt1").value =
    alternativas[0] || "";

    document.getElementById("alt2").value =
    alternativas[1] || "";

    document.getElementById("alt3").value =
    alternativas[2] || "";

    document.getElementById("alt4").value =
    alternativas[3] || "";

    document.getElementById("alt5").value =
    alternativas[4] || "";

});

document
.getElementById("formEditar")
.addEventListener(
    "submit",
    function(e){

        e.preventDefault();

        var tipo =
        document.querySelector(
            "input[name='tipo']:checked"
        ).value;

        var dados = {

            id:
            document.getElementById("id").value,

            pergunta:
            document.getElementById("pergunta").value,

            tipo: tipo,

            alternativa1:
            document.getElementById("alt1").value,

            alternativa2:
            document.getElementById("alt2").value,

            alternativa3:
            document.getElementById("alt3").value,

            alternativa4:
            document.getElementById("alt4").value,

            alternativa5:
            document.getElementById("alt5").value

        };

        fetch(
            "atualizar_pergunta.php",
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
                    "Pergunta atualizada"
                );

                window.location.href =
                "listar_perguntas.html";

            }

        });

    }
);