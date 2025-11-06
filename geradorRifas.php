<?php
$erro = [];
$b = "";
$t = "";
$p = "";
$v = "";

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $b = $_POST['b'];
    $t = $_POST['t'];
    $p = $_POST['p'];
    $v = $_POST['v'];

    $float_definition = [
        'filter' => [
        'options' => ',' 
        ]];

    $b = filter_input(INPUT_POST, 'bilhetes', FILTER_SANITIZE_NUMBER_INT);
    $t = filter_input(INPUT_POST,'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $p = filter_input(INPUT_POST,'premio', FILTER_SANITIZE_SPECIAL_CHARS);
    $v = filter_input(INPUT_POST,'valor', FILTER_SANITIZE_NUMBER_FLOAT);
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de rifas</title>
</head>
<body>
    
<form action="geradorRifas.php" method="post">
<label for="bilhetes">Insira quantos bilhetes você quer gerar</label>
<input type="number" id="bilhetes" name="b">

<label for="titulo">Insira o titulo o nome da campanha</label>
<input type="text" id="titulo" name="t">

<label for="premio">Insira o nome do prêmio que será rifado</label>
<input type="text" id="premio" name="p">

<label for="valor">Insira o quanto você irá pagar pelo bilhete</label>
<input type="text" id="valor" name="v">

<button type="submit">Gerar bilhetes</button>


</form>

</body>
</html>