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

   //ADD NEW TAGE 
    public function addtage($nameTag){
        $sql = "INSERT INTO `tags`(tag_name) value(:nametag)";

        $stmt = $this->conn->prepare($sql);
        $stmt->BindParam(':nametag',$nameTag);
        $resulte=$stmt->execute();
        if($resulte){
            return $resulte; 
        }else
        return false;  
    }

    //FOR UPDATE Tages
    public function getTage($idTage){
        $sql='SELECT * FROM tags WHERE id =:id';

        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id", $idTage);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            return false;
        } else {
            return $row = new Tages('',$row['tag_name']);
        }
    }
    public function insertUTage($idTage,$name){
        $sql='UPDATE tags SET tag_name=:name WHERE id=:id; ';

        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":id",$idTage);
        $row=$stmt->execute();
        if($row){
            return true;
        }else{
            return false;
        }
    }


    //DELETE TAGE 
    public function delettage($idDelet){
       
        $sql = "DELETE FROM tags WHERE id = :idDelet";
    
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