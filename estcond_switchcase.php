<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco 3: Estruturas Condicionais (Switch)</title>
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
        input[type="number"],
        select { 
            margin-bottom: 10px; 
            padding: 8px; 
            width: calc(100% - 18px); 
            max-width: 300px;
            display: block; 
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
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

    <h2>Bloco 3: Estruturas Condicionais (switch/case)</h2>

    <div class="exercicio">
        <h3>7. Dia da Semana</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex7'])) {
            $dia = filter_var($_POST['dia'], FILTER_VALIDATE_INT);
            
            switch ($dia) {
                case 1: $nome_dia = "1 - Domingo"; break;
                case 2: $nome_dia = "2 - Segunda-feira"; break;
                case 3: $nome_dia = "3 - Terça-feira"; break;
                case 4: $nome_dia = "4 - Quarta-feira"; break;
                case 5: $nome_dia = "5 - Quinta-feira"; break;
                case 6: $nome_dia = "6 - Sexta-feira"; break;
                case 7: $nome_dia = "7 - Sábado"; break;
                default: $nome_dia = "Número inválido"; break;
            }
            echo "<p>{$nome_dia}</p>";
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex7" value="1">
            <select name="dia" required>
                <option value="">Selecione um número...</option>
                <?php for($i=1; $i<=7; $i++) echo "<option value='$i'>$i</option>"; ?>
            </select>
            <button type="submit">Verificar Dia</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>8. Operações Matemáticas (Calculadora Simples)</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex8'])) {
            $n1 = filter_var($_POST['n1'], FILTER_VALIDATE_FLOAT);
            $n2 = filter_var($_POST['n2'], FILTER_VALIDATE_FLOAT);
            $op = $_POST['operacao'];
            
            if ($n1 !== false && $n2 !== false) {
                switch ($op) {
                    case 'somar': $res = $n1 + $n2; $sinal = "+"; break;
                    case 'subtrair': $res = $n1 - $n2; $sinal = "-"; break;
                    case 'multiplicar': $res = $n1 * $n2; $sinal = "*"; break;
                    case 'dividir': 
                        if ($n2 == 0) { $res = "Erro (divisão por zero)"; $sinal = "/"; }
                        else { $res = $n1 / $n2; $sinal = "/"; }
                        break;
                    default: $res = "Operação inválida"; $sinal = "?";
                }
                echo "<p>{$n1} {$sinal} {$n2} = <strong>{$res}</strong></p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex8" value="1">
            <input type="text" name="n1" placeholder="Número 1" required>
            <select name="operacao" required>
                <option value="somar">Somar</option>
                <option value="subtrair">Subtrair</option>
                <option value="multiplicar">Multiplicar</option>
                <option value="dividir">Dividir</option>
            </select>
            <input type="text" name="n2" placeholder="Número 2" required>
            <button type="submit">Calcular</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>9. Mês por Extenso</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex9'])) {
            $mes = filter_var($_POST['mes'], FILTER_VALIDATE_INT);
            $meses = ["", "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
            
            if ($mes >= 1 && $mes <= 12) {
                echo "<p>{$mes} - {$meses[$mes]}</p>";
            } else {
                echo "<p>Mês inválido.</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex9" value="1">
            <input type="number" name="mes" min="1" max="12" placeholder="Mês (1 a 12)" required>
            <button type="submit">Ver mês</button>
        </form>
    </div>

</body>
</html>