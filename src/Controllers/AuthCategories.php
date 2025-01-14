<?php
namespace App\Controllers;

use App\Models\CategorieModel;
use PDO;
use PDOException;

class AuthCategories{
    public function desplayCategorie(){
         $result = new CategorieModel();
         $Categorie =  $result->getCategorie();
         if($Categorie){
            return $Categorie  ;
         }else{
            return false;
         }
  

    } 
}
?>