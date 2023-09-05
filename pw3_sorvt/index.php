<?php
    require_once './Database.php';
    $pdo = Database::conexao();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flavors Factory</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>
    <header>
        <label for="sabor">Sabores de Sorvete</label>
        <form method="post" action="insert.php">
            <input type="text" name="sabor" id="sabor" placeholder="Sabor">
            <input id="botao" class="enviar" type="submit" value="CADASTRAR">
        </form>
    </header>
</body>
</html>