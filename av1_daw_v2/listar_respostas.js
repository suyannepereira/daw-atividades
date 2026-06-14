function carregarRespostas(){

    fetch("listar_respostas.php")
    .then(function(resposta){

        return resposta.json();

    })
    .then(function(dados){

        var tbody =
        document.querySelector(
            "#tabelaRespostas tbody"
        );

        tbody.innerHTML = "";

        for(
            var i = 0;
            i < dados.length;
            i++
        ){

            var linha = "<tr>";

            linha += "<td>";
            linha += dados[i].id_pergunta;
            linha += "</td>";

            linha += "<td>";
            linha += dados[i].resposta;
            linha += "</td>";

            linha += "<td>";

            linha +=
            "<button onclick='editarResposta(" +
            dados[i].id_pergunta +
            ")'>Editar</button>";

            linha += "</td>";

            linha += "</tr>";

            tbody.innerHTML += linha;

        }

    });

}

function editarResposta(id){

    window.location.href =
    "exibir_prova.html?id=" + id;

}

function entregarProva(){

    alert("Prova entregue!");

}

carregarRespostas();