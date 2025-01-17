<?php
namespace App\Config;
require_once __DIR__ ."../../../vendor/autoload.php";

use PDO;
use PDOException;

abstract class Db {
    private static $username = 'root';

    private static $password = 'anwar36flow';

    private static $dsn = 'mysql:host=172.22.208.1;dbname=Youdemy;charset=utf8';

    public static $affected_row;
    
    
    public static function connect(){

        try{
            $pdo = new PDO(self::$dsn, self::$username, self::$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           

        }catch(PDOException $e){
            error_log(date('Y-m-d H:i:s')." database connect error ".$e->getMessage(), 3, "errors.log");
            throw new Exception("hello worde");
        }
        return $pdo;
    }
}

?>