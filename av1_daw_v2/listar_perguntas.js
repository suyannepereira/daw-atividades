//Recebe o JSON

function carregarPerguntas(){

    fetch("listar_perguntas.php")
    .then(function(resposta){

        return resposta.json();

    })
    .then(function(perguntas){

        var tbody =
        document.querySelector(
            "#tabelaPerguntas tbody"
        );

        tbody.innerHTML = "";   //limpa a tabela

        for(var i = 0; i < perguntas.length; i++){ //percorre todas as perguntas

            var linha = "<tr>";

            linha += "<td>" +
                     perguntas[i].id +
                     "</td>";

            linha += "<td>" +
                     perguntas[i].pergunta +
                     "</td>";

            linha += "<td>" +
                     perguntas[i].tipo +
                     "</td>";

            linha += "<td>" +
                     perguntas[i].respostas +
                     "</td>";

            linha += "<td>";

            linha +=
            "<button onclick='editar(" +
            perguntas[i].id +
            ")'>Editar</button>";

            linha +=
            "<button onclick='excluirPergunta(" +
            perguntas[i].id +
            ")'>Excluir</button>";

            linha += "</td>";

            linha += "</tr>";

            tbody.innerHTML += linha;  //adiciona uma nova linha na tabela

        }

    });

}