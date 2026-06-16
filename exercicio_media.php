<?php
// --- BLOCO DE PROCESSAMENTO (PHP) ---
$n1 = $n2 = $n3 = "";
$media = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Lista de notas para facilitar a validação
$notas_postadas = [
'n1' => $_POST['n1'] ?? null,
'n2' => $_POST['n2'] ?? null,
'n3' => $_POST['n3'] ?? null,
];
$notas_validas = [];
$opcoes_filtro = ["options" => ["min_range" => 0, "max_range" =>
10]];
foreach ($notas_postadas as $chave => $valor) {
if (isset($valor) &amp;&amp; !empty(trim($valor))) {
$nota_filtrada = filter_var(trim($valor),
FILTER_VALIDATE_FLOAT, $opcoes_filtro);
if ($nota_filtrada === false) {
$erros[] = &quot;Nota &quot; . substr($chave, 1) . &quot; inválida.
Deve ser um número entre 0 e 10.&quot;;
$$chave = htmlspecialchars(trim($valor)); // Repopula
o campo com o valor inválido
} else {
$notas_validas[] = $nota_filtrada;
$$chave = $nota_filtrada; // Repopula o campo com o
valor válido
}
} else {
$erros[] = &quot;Nota &quot; . substr($chave, 1) . &quot; é
obrigatória.&quot;;
}
}
// Se todas as 3 notas foram válidas
if (count($notas_validas) == 3) {
$soma = $notas_validas[0] + $notas_validas[1] +
$notas_validas[2];
$media = $soma / 3;
}
}
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;pt-br&quot;&gt;
&lt;head&gt;
&lt;meta charset=&quot;UTF-8&quot;&gt;
&lt;title&gt;Ex. 1: Média Aritmética&lt;/title&gt;
&lt;style&gt;
body { font-family: Arial, sans-serif; margin: 20px; }
.erro { color: red; background-color: #ffe8e8; border: 1px
solid red; padding: 10px; margin-bottom: 15px; }
.resultado { color: blue; background-color: #e8f0ff; border:
1px solid blue; padding: 10px; margin-bottom: 15px; }
div { margin-bottom: 10px; }
label { display: inline-block; width: 60px; }
&lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h2&gt;Calculadora de Média Aritmética&lt;/h2&gt;
&lt;p&gt;Digite as três notas (de 0 a 10).&lt;/p&gt;
&lt;?php
// Exibe erros
if (count($erros) &gt; 0) {
echo &quot;&lt;div class=&#39;erro&#39;&gt;&lt;ul&gt;&quot;;
foreach ($erros as $erro) { echo &quot;&lt;li&gt;$erro&lt;/li&gt;&quot;; }
echo &quot;&lt;/ul&gt;&lt;/div&gt;&quot;;
}
// Exibe resultado
if ($media !== null) {
// Formata a média para 2 casas decimais
$media_formatada = number_format($media, 2, &#39;,&#39;, &#39;.&#39;);
echo "<div class='resultado'> A média das notas é:
<strong>$media_formatada</strong></div>;
}
?>
<form method="post" action="">
<div>
<label for="n1">Nota 1:</label>
<input type="text" id="n1" name="n1" value=<?=
htmlspecialchars($n1) ?>">
</div>
<div>
<label for="n2">Nota 2:</label>
<input type="text" id="n2" name="n2" value="<?=
htmlspecialchars($n2) ?>">
</div>
<div>
<label for="n3">Nota 3:</label>
<input type="text" id="n3" name="n3" value=<?= htmlspecialchars($n3) ?>">
</div>
<div>
<input type="submit" value="Calcular Média">
</div>
</form>
</body>
</html>