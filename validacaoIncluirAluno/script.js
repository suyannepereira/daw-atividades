function validarForm() {

    let nome = document.getElementById("nome").value.trim();
    let matricula = document.getElementById("matricula").value.trim();
    let email = document.getElementById("email").value.trim();

    if(nome === "" || matricula === "" || email === "") {
        alert("Preencha todos os campos");
        return false;
    }

    if(isNaN(matricula)) {
        alert("A matricula deve conter somente numeros");
        return false;
    }

    if(!email.includes("@") || !email.includes(".")) {
        alert("Digite um email que seja valido");
        return false;
    }

    return true;
}