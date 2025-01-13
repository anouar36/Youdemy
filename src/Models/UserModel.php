<?php
namespace App\Models;
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
        $sql = "SELECT * FROM users";

        $stmt = $this->conn->prepare($sql);
        $stmt->execut();

        $rows = fetchAll(PDO::FETCH_ASSOC);
        $Users=[];
        if($rows){
            foreach($rows as $row){
                $Users[] = new Users($row['id'],$row['username'],$row["email"],$row["password"],$row["role"]);

            }
            return $Users; 
        }
    }
    



}
?>