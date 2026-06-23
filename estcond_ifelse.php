<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco 2: Estruturas Condicionais</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
            background-color: #f4f4f9;
        }
        h2 {
            color: #333;
        }
        .exercicio { 
            background-color: #fff; 
            border: 1px solid #ddd; 
            padding: 20px; 
            margin-bottom: 20px; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .exercicio h3 { 
            margin-top: 0; 
            color: #0056b3; 
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        input[type="text"],
        input[type="number"] { 
            margin-bottom: 10px; 
            padding: 8px; 
            width: calc(100% - 18px); 
            max-width: 300px;
            display: block; 
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button { 
            padding: 10px 15px; 
            background-color: #0056b3; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        button:hover { 
            background-color: #004494; 
        }
        p { 
            font-weight: bold; 
            color: #28a745; 
            background-color: #e8f5e9;
            padding: 10px;
            border-left: 4px solid #28a745;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <h2>Bloco 2: Estruturas Condicionais (if/else)</h2>

    <div class="exercicio">
        <h3>4. Situação do Aluno (Média)</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex4'])) {
            $n1 = filter_var($_POST['n1'], FILTER_VALIDATE_FLOAT);
            $n2 = filter_var($_POST['n2'], FILTER_VALIDATE_FLOAT);
            
            if ($n1 !== false && $n2 !== false) {
                $media = ($n1 + $n2) / 2;
                $situacao = "";
                
                if ($media >= 7) {
                    $situacao = "Aprovado";
                } elseif ($media >= 4) {
                    $situacao = "Em Recuperação";
                } else {
                    $situacao = "Reprovado";
                }
                echo "<p>Média: {$media} - Situação: <strong>{$situacao}</strong></p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex4" value="1">
            <input type="text" name="n1" placeholder="Nota 1" required>
            <input type="text" name="n2" placeholder="Nota 2" required>
            <button type="submit">Verificar Situação</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>5. Verificador de Idade (Votação)</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex5'])) {
            $ano_nascimento = filter_var($_POST['ano'], FILTER_VALIDATE_INT);
            
            if ($ano_nascimento !== false) {
                $idade = date('Y') - $ano_nascimento;
                $mensagem = "";
                
                if ($idade >= 18 && $idade < 70) {
                    $mensagem = "Voto Obrigatório";
                } elseif (($idade >= 16 && $idade < 18) || $idade >= 70) {
                    $mensagem = "Voto Facultativo";
                } else {
                    $mensagem = "Não pode votar";
                }
                echo "<p>Idade: {$idade} anos - <strong>{$mensagem}</strong></p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex5" value="1">
            <input type="number" name="ano" placeholder="Ano de Nascimento" required>
            <button type="submit">Verificar Voto</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>6. Par ou Ímpar</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex6'])) {
            $num = filter_var($_POST['num'], FILTER_VALIDATE_INT);
            
            if ($num !== false) {
                $resultado = ($num % 2 == 0) ? "PAR" : "ÍMPAR";
                echo "<p>O número {$num} é <strong>{$resultado}</strong></p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex6" value="1">
            <input type="number" name="num" placeholder="Digite um número inteiro" required>
            <button type="submit">Verificar</button>
        </form>
    </div>

</body>
</html>