function validarForm() {
    let nome = document.getElementById("nome").value;
    let matricula = document.getElementById("matricula").value;
    let idade = document.getElementById("idade").value;

    if(nome === "" || matricula === "" || idade === "") {
        alert("Preencha todos os campos!");
        return false;
    }

    if(isNaN(idade)) {
        alert("Idade deve ser um número!");
        return false;
    }

    return true;
}