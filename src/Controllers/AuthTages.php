<?php
namespace App\Controllers;

use App\Models\TageModel;
use PDO;
use PDOException;

class AuthTages{
    public function desplayTags(){
         $result = new TageModel();
         $tags =  $result->getTags();
         if($tags){
            return $tags  ;
         }else{
            return false;
         }
  

    } 
}
?>