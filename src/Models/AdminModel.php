<?php
namespace App\Models;

use App\Config\Db;
use App\Classes\User;
use App\Classes\Tages;

use PDO;
use PDOException;

class AdminModel{
    private $conn;


    public function __construct(){

        $this->conn = Db::connect();
    }



    public function deletUser($idUsre){
        
        $sql="DELETE FROM users WHERE id = :id  ";

        $stmt= $this->conn->prepare($sql);
        $stmt->bindParam(":id",$idUsre);
        $row=$stmt->execute();
        if(!$row)
            return false;
        else
            return true;
        
    }


    //FOR UPDATE USER
    public function getUser($idUsre){
        $sql='SELECT * FROM users WHERE id =:id';

        $stmt= $this->conn->prepare($sql);

        $stmt->bindParam(":id", $idUsre);
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            return false;
        } else {
            return $row = new User('',$row['username'],$row['email'],'',$row['role']);
        }
    }
    public function insertUpdat($username, $email, $role, $idUsre){
        
        $sql='UPDATE users SET username=:user, email=:email, role=:role WHERE id=:id; ';

        $stmt= $this->conn->prepare($sql);

        $stmt->bindParam(":user",$username);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":role",$role);
        $stmt->bindParam(":id",$idUsre);
        $row=$stmt->execute();
        if($row){
            return true;
        }else{
            return false;
        }

    }

}


?>