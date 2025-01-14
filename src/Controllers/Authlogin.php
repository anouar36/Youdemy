<?php
namespace App\Controllers;

use App\Classes\User;
use App\Models\UserModel;
use PDO;
use PDOException;


class Authlogin {

    public function ckeckeMembers($email,$password){
      
         $UserModel = new UserModel();
         $resulte   = $UserModel->findUserByEmailAndPassword($email,$password);
         if($resulte != false) {
            if($resulte->getRole()=='Administrateur'){
                header('Location:../../views/admin/Administrateur.php');

            }else if ($resulte->getRole()=='Etudiant') {
                header('Location:../../views/etudiant/etudiant.php');

            }else if ($resulte->getRole()=='Enseignant'){
                header('Location:../../views/enseignant/enseignant.php');
            }
         }

    }
}
?>