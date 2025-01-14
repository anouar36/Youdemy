<?php
namespace App\Controllers;

use App\Classes\User;
use App\Models\UserModel;
use PDO;
use PDOException;


class Authregester{

    public function regester($username,$email,$password,$role){
      
         $UserModel = new UserModel();
         $resulte   = $UserModel->findUserByEmailAndPassword($email,$password);
         if($resulte){
            return false ;
         }else{
            $resultes  = $UserModel->addUser($username,$email,$password,$role);
            if($resulte==true){
                return false;
            }else{
                header('Location:../../views/auth/login.php');
         }

    }
}
}
?>