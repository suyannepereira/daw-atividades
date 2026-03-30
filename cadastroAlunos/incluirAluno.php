<?php
$msg = "";

// Quando o formulário for enviado
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];

    // Cria o arquivo se não existir
    if(!file_exists("alunos.txt")){
        $arqAlunos = fopen("alunos.txt","w") or die("Erro ao criar arquivo");
        fclose($arqAlunos);
    }

    // Abre o arquivo para adicionar
    $arqAlunos = fopen("alunos.txt","a") or die("Erro ao abrir arquivo");

    // Salva no padrão correto: matricula;nome;email
    fwrite($arqAlunos, "$matricula;$nome;$email\n");

    fclose($arqAlunos);

    $msg = "Aluno cadastrado com sucesso";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Aluno</title>

    <style>
        body {
            font-family: Arial;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 300px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background: #4A90E2;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #357ABD;
        }

        a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }

        p {
            color: green;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Cadastrar Aluno</h1>

    <form action="incluirAluno.php" method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Matrícula:</label>
        <input type="text" name="matricula" required>

        <label>Email:</label>
        <input type="text" name="email" required>

        <input type="submit" value="Cadastrar">
    </form>

    <?php if($msg != ""){ ?>
        <p><?php echo $msg ?></p>
    <?php } ?>

    <a href="index.php">Voltar</a>
</div>

</body>
</html>