<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco 4: Laços de Repetição</title>
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

    <h2>Bloco 4: Laços de Repetição (for ou while)</h2>

    <div class="exercicio">
        <h3>10. Fatorial de um Número</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex10'])) {
            $n = filter_var($_POST['n'], FILTER_VALIDATE_INT);
            
            if ($n !== false && $n >= 0) {
                $fatorial = 1;
                for ($i = $n; $i > 1; $i--) {
                    $fatorial *= $i;
                }
                echo "<p>O fatorial de {$n} é {$fatorial}</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex10" value="1">
            <input type="number" name="n" placeholder="Número inteiro" min="0" required>
            <button type="submit">Calcular Fatorial</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>11. Somatório de 1 a N</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex11'])) {
            $n = filter_var($_POST['n'], FILTER_VALIDATE_INT);
            
            if ($n !== false && $n > 0) {
                $soma = 0;
                for ($i = 1; $i <= $n; $i++) {
                    $soma += $i;
                }
                echo "<p>A soma dos números de 1 a {$n} é {$soma}</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex11" value="1">
            <input type="number" name="n" placeholder="Número positivo" min="1" required>
            <button type="submit">Calcular Soma</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>12. Sequência de Pares (Intervalo)</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex12'])) {
            $inicio = filter_var($_POST['inicio'], FILTER_VALIDATE_INT);
            $fim = filter_var($_POST['fim'], FILTER_VALIDATE_INT);
            
            if ($inicio !== false && $fim !== false && $inicio <= $fim) {
                $pares = [];
                for ($i = $inicio; $i <= $fim; $i++) {
                    if ($i % 2 == 0) {
                        $pares[] = $i;
                    }
                }
                $resultado = implode(", ", $pares);
                echo "<p>Pares entre {$inicio} e {$fim}: {$resultado}</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex12" value="1">
            <input type="number" name="inicio" placeholder="Início" required>
            <input type="number" name="fim" placeholder="Fim" required>
            <button type="submit">Buscar Pares</button>
        </form>
    </div>

</body>
</html>