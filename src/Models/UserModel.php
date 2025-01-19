<?php
namespace App\Models;
session_start();

use App\Classes\User;
use App\Config\Db;
use PDO;
use PDOException;

class UserModel{
    private $conn;

    public function __construct(){
        $this->conn = Db::connect();
    }

    public function findUserByEmailAndPassword($email,$password){
        
        $sql = "SELECT * FROM users WHERE users.email=:email";

        $stmt = $this->conn->prepare($sql); 
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        

         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         if($row){
         $_SESSION["id"] = $row["id"];
         $_SESSION["role"] = $row["role"];

        return new User($row['id'],$row['username'],$row["email"],$row["password"],$row["role"]);
         }
         else{
         return false;
         }
        

    }
    public function getDataUsers(){
        $sql = "SELECT * FROM `users` WHERE 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $rows =$stmt->fetchAll(PDO::FETCH_ASSOC);
        $Users=[];
        if($rows){
            foreach($rows as $row){
                $Users[] = new User($row['id'],$row['username'],$row["email"],$row["password"],$row["role"]);
            }
            return $Users; 
        }else
        return false;  
    }


    public function addUser($username,$email,$password,$role){
        
        
        $sql="INSERT INTO users (username,email,password,role)
              VALUES(:username,:email,:password,:role)";


        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":email", $email );
        $stmt->bindParam(":password",$password);
        $stmt->bindParam(":role",$role);
        $row=$stmt->execute();
    
        if($row==false){
            return false;
        }else{
            return true;
        }

    }
}
?>
