<?php
namespace App\Controllers;

use App\Models\UserModel;
use PDO;
use PDOException;

class AuthUsers{
    public function desplayUsers(){
         $result = new UserModel();
         $Users =  $result->getDataUsers();
         if($Users){
            return $Users  ;
         }else{
            return false;
         }
    } 
    
}
?>