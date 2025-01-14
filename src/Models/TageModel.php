<?php
namespace App\Models;

use App\Classes\Tages;
use App\Config\Db;
use PDO;
use PDOException;

class TageModel{
    private $conn;

    public function __construct(){
        $this->conn = Db::connect();
    }
  
    public function getTags(){
        $sql = "SELECT * FROM `tags` WHERE 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $rows =$stmt->fetchAll(PDO::FETCH_ASSOC);
        $Tages=[];
        if($rows){
            foreach($rows as $row){
                $Tages[] = new Tages($row['id'],$row['tag_name']);
            }
            return $Tages; 
        }else
        return false;  
    }
    



}
?>