<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Disciplinas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            padding: 20px;
            margin: 0;
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
            color: #333;
        }

        .disciplina {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
        }

        .disciplina:last-child {
            border-bottom: none;
        }

        a {
            text-decoration: none;
            background-color: #4A90E2;
            color: white;
            padding: 5px 12px;
            border-radius: 5px;
            font-size: 0.9em;
            margin-right: 5px;
            display: inline-block;
        }

        a:hover {
            background-color: #357ABD;
        }

        .cadastrar {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            padding: 12px;
            font-weight: bold;
            background-color: #28a745; /* Verde para destacar o cadastro */
        }

        .cadastrar:hover {
            background-color: #218838;
        }

        .info {
            margin-bottom: 10px;
            line-height: 1.5;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistema de Disciplinas</h1>

    <a class="cadastrar" href="incluirDisciplina.php">Cadastrar Nova Disciplina</a>

    <?php
    $arquivo = "disciplinas.txt";

    // Verifica se o arquivo existe antes de tentar ler para evitar erros
    if (file_exists($arquivo)) {
        $linhas = file($arquivo);

        foreach ($linhas as $linha) {
            // Remove espaços em branco e quebras de linha
            $linha = trim($linha);
            if (empty($linha)) continue;

            $dados = explode(";", $linha);

            // Garantir que o array tem os 3 índices para não dar erro de "Undefined Offset"
            if (count($dados) >= 3) {
                echo "<div class='disciplina'>";
                echo "<div class='info'>";
                echo "<strong>Sigla:</strong> " . $dados[0] . "<br>";
                echo "<strong>Nome:</strong> " . $dados[1] . "<br>";
                echo "<strong>Carga Horária:</strong> " . $dados[2] . "h";
                echo "</div>";

                // Links de ação usando a Sigla como ID
                echo "<a href='alterarDisciplina.php?id=" . $dados[0] . "'>Alterar</a>";
                echo "<a href='excluirDisciplina.php?id=" . $dados[0] . "'>Excluir</a>";
                echo "</div>";
            }
        }
    } else {
        echo "<p style='text-align:center;'>Nenhuma disciplina cadastrada ainda.</p>";
    }
    ?>

</div>

</body>
</html>