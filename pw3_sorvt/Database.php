<?php
    class Database
    {
        protected static $db;
    
        # Private construct - garante que a classe só possa ser instanciada internamente.
        private function __construct()
        {
            # Informações sobre o banco de dados:
            $db_host = "localhost";
            $db_nome = "bd_sorvt";
            $db_usuario = "root";
            $db_password = "";
            $db_driver = "mysql";
    
            try
            {
                self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->exec('SET NAMES utf8');
            }
            catch (PDOException $e)
            {
                die("Connection Error: " . $e->getMessage());
            }
        }
        public static function conexao()
        {
            if (!self::$db)
            {
                new Database();
            }
            return self::$db;
        }
    
    }
?>