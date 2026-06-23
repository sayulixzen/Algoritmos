<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco 5: Manipulação de Arrays</title>
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
        /* Estilos específicos para os checkboxes não ficarem 100% de largura */
        input[type="checkbox"] {
            margin-right: 8px;
            transform: scale(1.2);
        }
        label {
            display: inline-block;
            margin-bottom: 8px;
            cursor: pointer;
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
        ul {
            color: #28a745;
            background-color: #e8f5e9;
            padding: 10px 10px 10px 30px;
            border-left: 4px solid #28a745;
            margin-top: -15px; /* Para colar com o parágrafo de resultado */
        }
    </style>
</head>
<body>

    <h2>Bloco 5: Manipulação de Arrays</h2>

    <div class="exercicio">
        <h3>13. Média de Vários Valores</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex13'])) {
            $notas = $_POST['notas'];
            $soma = 0;
            
            foreach ($notas as $nota) {
                $soma += (float)$nota;
            }
            
            $media = $soma / count($notas);
            echo "<p>A média das 5 notas é: " . number_format($media, 2, ',', '.') . "</p>";
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex13" value="1">
            <?php for($i=1; $i<=5; $i++): ?>
                <input type="text" name="notas[]" placeholder="Nota <?= $i ?>" required>
            <?php endfor; ?>
            <button type="submit">Calcular Média Array</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>14. Lista de Compras (Checkboxes)</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex14'])) {
            if (!empty($_POST['itens'])) {
                echo "<p>Itens selecionados:</p><ul>";
                foreach ($_POST['itens'] as $item) {
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenhum item selecionado.</p>";
            }
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex14" value="1">
            <label><input type="checkbox" name="itens[]" value="Arroz"> Arroz</label><br>
            <label><input type="checkbox" name="itens[]" value="Feijão"> Feijão</label><br>
            <label><input type="checkbox" name="itens[]" value="Leite"> Leite</label><br>
            <label><input type="checkbox" name="itens[]" value="Ovos"> Ovos</label><br>
            <button type="submit" style="margin-top: 10px;">Enviar Lista</button>
        </form>
    </div>

    <div class="exercicio">
        <h3>15. Encontrar o Maior Valor</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ex15'])) {
            $numeros = $_POST['numeros'];
            $maior = (float)$numeros[0]; 
            
            foreach ($numeros as $num) {
                if ((float)$num > $maior) {
                    $maior = (float)$num;
                }
            }
            echo "<p>O maior número digitado foi: {$maior}</p>";
        }
        ?>
        <form method="post">
            <input type="hidden" name="ex15" value="1">
            <?php for($i=1; $i<=5; $i++): ?>
                <input type="number" name="numeros[]" placeholder="Número <?= $i ?>" required>
            <?php endfor; ?>
            <button type="submit">Encontrar Maior</button>
        </form>
    </div>

</body>
</html>