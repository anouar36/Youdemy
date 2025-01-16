<?php
namespace App\Controllers;

use App\Models\TageModel;
use App\Models\CategorieModel;

class AuthEnseignant{ 
 
    public function getTages(){
        $result = new TageModel();
        $rows =$result->getTags();
        if(!$rows){
            return false;
        }else{
        return $rows ;
        }
    }

    public function getCategories(){
        $result = new CategorieModel();
        $rows =$result->getCategorie();
        if(!$rows){
            return false;
        }else{
        return $rows ;
        }
    }
}
?>