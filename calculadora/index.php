<?php

$resultado = "";
$erro = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $a = $_POST["a"];
    $b = $_POST["b"];
    $operador = $_POST["operador"];

    if($operador == "soma"){
        $resultado = $a + $b;
    }

    elseif($operador =="sub"){
        $resultado =$a - $b;
    }

    elseif($operador == "multi"){
        $resultado = $a * $b;
    }

    elseif($operador == "divide"){

        if($b == 0){
            $erro = "Não é possível dividir por zero";
        }else{
            $resultado = $a / $b;
        }

    }

    elseif($operador == "potencia"){
        $resultado = pow($a,$b);
    }

    elseif($operador == "raiz"){
        if($b == 0){
            $erro = "Índice da raiz não pode ser zero";
        }else{
            $resultado = pow($a,1/$b);
        }

    }

}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calculadora</title>

<link rel="stylesheet" href="style.css">
<script src="js/script.js"></script>
</head>

<body>
<div class="calculadora">

<h1>Minha Calculadora</h1>

<form method="POST" onsubmit="return validar()">

<label>Digite o primeiro operador:</label>
<input type="text" name="a" id="a">

<label>Digite o segundo operador:</label>
<input type="text" name="b" id="b">

<label>Escolha a operação matemática:</label>

<select name="operador">

<option value="soma">Adição</option>
<option value="sub">Subtração</option>
<option value="multi">Multiplicação</option>
<option value="divide">Divisão</option>
<option value="potencia">Potência</option>
<option value="raiz">Radiciação</option>
</select>

<button type="submit">Calcular</button>
</form>

<div class="resultado">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if($erro != ""){
        echo $erro;
    }else{
        echo "Resultado: " . $resultado;
    }

}

?>

</div>

</div>

</body>
</html>