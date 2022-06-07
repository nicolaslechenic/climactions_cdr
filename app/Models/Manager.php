<?php
namespace Climactions\Models;
use FFI\Exception;

class Manager {

  private static $pdo = null;
    
  protected static function connect() {
    if(isset(self::$pdo)) {
      return self::$pdo;
      
    } else {
      try {
        $path = "mysql:host=" . $_ENV['DB_HOST'] . ":" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8";

        self::$pdo = new \PDO($path,$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
        self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        
        return self::$pdo;

      } catch (Exception $e) {
        die('Erreur : ' .$e->getMessage());
      }
    }
  }
  // Mini ORM
  public static function all(): array {
    $objects = [];

    $child = get_called_class();

    $req = 'SELECT * FROM `{$child}`';

    foreach (self::connect()->prepare($req) as $data) {
      $data->execute(array_push($objects, new $child($data)));
    }
    return $objects;
  }
}