<?php
namespace Projet\Models;
use FFI\Exception;

class Manager {

    private static $pdo = null;
    
    protected static function connect() {
        if(isset(self::$pdo)){

            return self::$pdo;
            
        }else{
            try{
                $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

                self::$pdo = 
                    new \PDO(
                        $path,
                        $_ENV['DB_USERNAME'],
                        $_ENV['DB_PASSWORD']
                    );

                return self::$pdo;

            }catch (Exception $e){

                die('Erreur : ' .$e->getMessage());
                
            }
        }
    }
} 
?>