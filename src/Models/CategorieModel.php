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

  
    
   //ADD NEW categories 
    public function addCategorie($nameCategorie){
        $sql = "INSERT INTO `categories` (categorie_name) value(:nameCategorie)";

        $stmt = $this->conn->prepare($sql);
        $stmt->BindParam(':nameCategorie',$nameCategorie);
        $resulte=$stmt->execute();
        if($resulte){
            return $resulte; 
        }else
        return false;  
    }

    //FOR UPDATE Categorie
    public function getCategori($idCategori){
        $sql='SELECT * FROM categories WHERE id =:id';

        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id", $idCategori);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            return false;
        } else {
            return $row = new categories('',$row['categorie_name']);
        }
    }
    public function updateCategories($idCategorie,$nameCategorie){
        $sql='UPDATE categories SET categorie_name=:name WHERE id=:id; ';

        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":name",$nameCategorie);
        $stmt->bindParam(":id",$idCategorie);
        $row=$stmt->execute();
        if($row){
            return true;
        }else{
            return false;
        }
    }


    //DELETE TAGE 
    public function deletCat($idDelet){
        $sql = "DELETE FROM categories WHERE id = :idDelet";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->BindParam(":idDelet",$idDelet);
        $resulte=$stmt->execute();
        if($resulte){
         return $resulte; 
        }else
         return false;  
    }
}
?>