<?php
// ... [SEU CÓDIGO PHP INTACTO] ...
$erro = [];
$b = "";
$t = "";
$p = "";
$v = "";

if($_SERVER['REQUEST_METHOD'] =='POST'){
  
    $b = filter_input(INPUT_POST, 'b', FILTER_SANITIZE_NUMBER_INT);
    $t = filter_input(INPUT_POST,'t', FILTER_SANITIZE_SPECIAL_CHARS);
    $p = filter_input(INPUT_POST,'p', FILTER_SANITIZE_SPECIAL_CHARS);

    $float_definition = [
        'options' => [
        'default' => 0.0
        ],
        'flags' => FILTER_FLAG_ALLOW_FRACTION];

    $v_validado = filter_input(INPUT_POST,'v', FILTER_SANITIZE_NUMBER_FLOAT, $float_definition);
 

    if(is_null($b) || empty($b) || $b < 1){
        $erro[] =  "Selecione a quantidade de bilhetes xiru!";
    }

    if(is_null($t) || empty($t)){
        $erro[]= "Crie um titulo!";
    }
    if(is_null($p) || empty($p)){
        $erro[]= "O gênio como vai ter uma rifa sem prêmio?";
    }

    if($v_validado === false || is_null($v_validado)){
        $erro[] = "O valor está errado, use números";
    }else{
        $v = $v_validado;
    }

    if(empty($erro) !== null && $b !== null && $t !== null && $p !== null && $v_validado !== null
    && $b !== false && $t !== false && $p !== false && $v_validado !== false){
            for($i = 1; $i<= $b; $i++){
            echo "
            <div class='bilhete'>
                <h3>🎟️ Bilhete Nº **" . str_pad($i, 2, '0', STR_PAD_LEFT) . "** de $b</h3>
                <p><strong>Campanha:</strong> $t</p>
                <p><strong>Prêmio:</strong> $p</p>
                <p><strong>Valor:</strong> R$ " . number_format($v, 2, ',', '.') . "</p>
            </div>
            ";
            }
           
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Rifas - Onde a Preguiça Encontra o PHP</title>
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a2e; 
            color: #e4e4e4; 
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #2e3048; 
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        form label, form input, form button {
            display: block;
            margin-top: 10px;
        }

        form input[type="text"], form input[type="number"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #5267a5;
            background: #1a1a2e;
            color: #e4e4e4;
            border-radius: 4px;
        }

        form button[type="submit"] {
            background-color: #e94560; 
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        form button[type="submit"]:hover {
            background-color: #ff6a80;
        }
        
        .erro {
            background-color: #ff5757; 
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .bilhete {
            border: 1px solid #5267a5; 
            padding: 15px; 
            margin-bottom: 10px; 
            background-color: #16213e;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎟️ Gerador de Rifas Nível Preguiça 🚀</h1>

        <?php 
        if($_SERVER['REQUEST_METHOD'] =='POST' && !empty($erro)){
            echo "<div class='erro'>";
            foreach($erro as $err){
                echo "<p>$err</p>";
            }
            echo "</div>";
        }
        ?>

        <form action="geradorRifas.php" method="post">
            <div class="form-group">
                <label for="bilhetes">Insira quantos bilhetes você quer gerar</label>
                <input type="number" id="bilhetes" name="b" value="<?= htmlspecialchars($b) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="titulo">Insira o titulo o nome da campanha</label>
                <input type="text" id="titulo" name="t" value="<?= htmlspecialchars($t) ?>" required>
            </div>

            <div class="form-group">
                <label for="premio">Insira o nome do prêmio que será rifado</label>
                <input type="text" id="premio" name="p" value="<?= htmlspecialchars($p) ?>" required>
            </div>

            <div class="form-group">
                <label for="valor">Insira o quanto você irá pagar pelo bilhete</label>
                <input type="text" id="valor" name="v" value="<?= htmlspecialchars($v_validado) ?>" required>
            </div>

            <button type="submit">Gerar bilhetes (Go Go Power Rangers!)</button>
        </form>
    </div> <div class="container" style="margin-top: 20px;">
        <h2>Bilhetes Gerados:</h2>
        <?php 
        ?>
    </div>

</body>
</html>