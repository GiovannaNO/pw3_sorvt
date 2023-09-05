<?php
    require_once './Database.php';
    $pdo = Database::conexao();

    final class Sorvete {
        public $sabor;

        function envSorvete($pdo, $sabor){
            if(!empty($sabor)){
                $sql = "SELECT * FROM tb_sorvt WHERE sabor = :sabor";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':sabor', $sabor);
                $stmt->execute();
                if($stmt->rowCount() > 0){
                    echo("Esse sabor já existe nos registros!");
                    echo("<meta http-equiv='refresh' content='1; index.php'>");

                }else{
                    try{
                        $sql = "INSERT INTO tb_sorvt (sabor) VALUES (:sabor)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':sabor', $sabor);
                        if($stmt->execute()){ 
                            echo("Sabor enviado com sucesso!");
                            echo("<meta http-equiv='refresh' content='1; index.php'>"); 
                        }else{
                            throw new Exception('Ocorreu um erro!');  
                        }
                    }catch(PDOException $e){
                        echo 'Error: '.$e->getMessage();
                    }
                }
            }else{
                echo "Digite um sabor de sorvete!";
            }
        }
    }
?>