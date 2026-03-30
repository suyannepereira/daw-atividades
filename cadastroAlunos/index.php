<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Alunos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            padding: 20px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
        }

        .aluno {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        a {
            text-decoration: none;
            background-color: #4A90E2;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }

        a:hover {
            background-color: #357ABD;
        }

        .cadastrar {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistema de Alunos</h1>

    <a class="cadastrar" href="incluirAluno.php">Cadastrar Novo Aluno</a>

    <?php
    $linhas = file("alunos.txt");

    foreach ($linhas as $linha) {
        $dados = explode(";", trim($linha));

        echo "<div class='aluno'>";
        echo "Matrícula: " . $dados[0] . "<br>";
        echo "Nome: " . $dados[1] . "<br>";
        echo "Email: " . $dados[2] . "<br><br>";

        echo "<a href='alterarAluno.php?id=" . $dados[0] . "'>Alterar</a>";
        echo "<a href='excluirAluno.php?id=" . $dados[0] . "'>Excluir</a>";

        echo "</div>";
    }
    ?>

</div>

</body>
</html>