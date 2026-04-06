<?php
$msg = "";


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $sigla = $_POST["sigla"];
    $nome = $_POST["nome"];
    $cargaHoraria = $_POST["cargaHoraria"];

    
    $arquivo = "disciplinas.txt";

    // Cria o arquivo se não existir
    if(!file_exists($arquivo)){
        $arq = fopen($arquivo,"w") or die("Erro ao criar arquivo");
        fclose($arq);
    }

    
    $arq = fopen($arquivo,"a") or die("Erro ao abrir arquivo");

    
    fwrite($arq, "$sigla;$nome;$cargaHoraria\n");

    fclose($arq);

    $msg = "Disciplina cadastrada com sucesso!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Disciplina</title>

    <style>
        body {
            font-family: Arial;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
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
            box-sizing: border-box; /* Garante que o padding não aumente a largura */
        }

        input[type="submit"] {
            background: #4A90E2;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background: #357ABD;
        }

        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #555;
            font-size: 0.9em;
        }

        p {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Cadastrar Disciplina</h1>

    <form action="incluirDisciplina.php" method="POST">

        <label>Sigla:</label>
        <input type="text" name="sigla" placeholder="Ex: DAW1" required>

        <label>Nome da Disciplina:</label>
        <input type="text" name="nome" placeholder="Ex: Desenvolvimento Web" required>

        <label>Carga Horária:</label>
        <input type="number" name="cargaHoraria" placeholder="Ex: 60" required>

        <input type="submit" value="Cadastrar Disciplina">
    </form>

    <?php if($msg != ""){ ?>
        <p><?php echo $msg ?></p>
    <?php } ?>

    <a href="index.php">Voltar</a>
</div>

</body>
</html>