<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco 1: Algoritmos Sequenciais</title>
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
        input[type="text"] { 
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

    <h2>Bloco 1: Cálculos Simples</h2>

    <div class="exercicio">
        <h3>1. Conversor de Moedas</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex1'])) {
            $reais = filter_var($_POST['reais'], FILTER_VALIDATE_FLOAT);
            $cotacao = filter_var($_POST['cotacao'], FILTER_VALIDATE_FLOAT);
            
            if ($reais !== false && $cotacao !== false && $cotacao > 0) {
                $usd = $reais / $cotacao;
                echo "<p>R$ " . number_format($reais, 2, ',', '.') . " equivalem a US$ " . number_format($usd, 2, ',', '.') . "</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex1" value="1">
            <input type="text" name="reais" placeholder="Valor em R$" required>
            <input type="text" name="cotacao" placeholder="Cotação do Dólar" required>
            <button type="submit">Converter</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>2. Calculadora de Área e Perímetro</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex2'])) {
            $base = filter_var($_POST['base'], FILTER_VALIDATE_FLOAT);
            $altura = filter_var($_POST['altura'], FILTER_VALIDATE_FLOAT);
            
            if ($base !== false && $altura !== false) {
                $area = $base * $altura;
                $perimetro = 2 * ($base + $altura);
                echo "<p>Área: {$area} m² | Perímetro: {$perimetro} m</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex2" value="1">
            <input type="text" name="base" placeholder="Base (m)" required>
            <input type="text" name="altura" placeholder="Altura (m)" required>
            <button type="submit">Calcular</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>3. Consumo de Combustível</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex3'])) {
            $distancia = filter_var($_POST['distancia'], FILTER_VALIDATE_FLOAT);
            $litros = filter_var($_POST['litros'], FILTER_VALIDATE_FLOAT);
            
            if ($distancia !== false && $litros !== false && $litros > 0) {
                $consumo = $distancia / $litros;
                echo "<p>Consumo médio: " . number_format($consumo, 2, ',', '.') . " Km/L</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex3" value="1">
            <input type="text" name="distancia" placeholder="Distância (Km)" required>
            <input type="text" name="litros" placeholder="Combustível gasto (L)" required>
            <button type="submit">Calcular Consumo</button>
        </form>
    </div>

</body>
</html>