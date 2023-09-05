<?php
    require_once './Database.php';
    require 'Sorvete.php';
    $pdo = Database::conexao();
    if(isset($_POST)){
        $sabor = new Sorvete();
        $sabor->sabor = $_POST['sabor'];

        $sabor->envSorvete($pdo, $sabor->sabor);
    }
?>