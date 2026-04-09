function validarForm() {
    // Busca os valores pelos novos IDs (sigla, nome, cargaHoraria)
    let sigla = document.getElementById("sigla").value;
    let nome = document.getElementById("nome").value;
    let cargaHoraria = document.getElementById("cargaHoraria").value;

    // Validação de campos vazios
    if(sigla === "" || nome === "" || cargaHoraria === "") {
        alert("Preencha todos os campos da disciplina!");
        return false;
    }

    // Validação se a carga horária é um número
    if(isNaN(cargaHoraria) || cargaHoraria <= 0) {
        alert("A carga horária deve ser um número válido e maior que zero!");
        return false;
    }

    return true;
}