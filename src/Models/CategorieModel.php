<?php
namespace App\Models;

use App\Classes\categories;
use App\Config\Db;
use PDO;
use PDOException;

class CategorieModel{
    private $conn;

    public function __construct(){
        $this->conn = Db::connect();
    }
  
    public function getCategorie(){
        $sql = "SELECT * FROM `categories` WHERE 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $rows =$stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories=[];
        if($rows){
            foreach($rows as $row){
                $categories[] = new categories($row['id'],$row['categorie_name']);
            }
            return $categories; 
        }else
        return false;  
    }
    



}
?>