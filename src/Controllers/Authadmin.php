<?php
namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\TageModel;
use App\Models\CategorieModel;

class Authadmin{ 
 
    public function delet($idUsre){
    
        $deletUser= new AdminModel();
        $resule= $deletUser->deletUser($idUsre);
        if(!$resule){
            return false;
        }else{
            return true;

        }  
    } 

    //update for users 
    public function update($idUsre){
        $getUser= new AdminModel();
        $row=$getUser->getUser($idUsre);
        if(!$row){
            return false;
        }else{
            return $row;
        }   
    }

    public function updateUser($username, $email, $role, $idUsre){
        $getUser= new AdminModel();
        $row = $getUser->insertUpdat($username, $email, $role, $idUsre);
        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/administrateur.php');
            return $row;
        }   
    } 
 
    //update for Tges 
    public function checkeTges($idTage){
        $getTage= new TageModel();
        $row=$getTage->getTage($idTage);
        if(!$row){
            return false;
        }else{
            return $row;
        }   
    } 

    public function updateTag($idtage,$nameTag){
        $getTage= new TageModel();
        $row = $getTage->insertUTage($idtage,$nameTag);
        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/adminTage.php');
            return $row;
        }   
    } 

     //ADD TAGE
    public function addTag($nameTag){
        $addTage= new TageModel();
        $row = $addTage->addtage($nameTag);
        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/adminTage.php');
        }   
    } 

    //DELETE TAGE 
    public function deletTag($idDelet){
        $deletTag= new TageModel();
        $row = $deletTag->delettage($idDelet);
        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/adminTage.php');
        }   
    } 

    //ADD Categorie
    public function addCategorie($nameCategorie){
        $addCategorie= new CategorieModel();
        $row = $addCategorie->addCategorie($nameCategorie);

        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/adminCategories.php');
        }   
    } 
    
    //update for Categories 
    public function checkeCategories($idCategorie){
        $getCategorie= new CategorieModel();
        $row=$getCategorie->getCategori($idCategorie);
        if(!$row){
            return false;
        }else{
            return $row;
        }   
    } 

    public function updateCategories($idCategorie,$nameCategorie){

        $getCategorie= new CategorieModel();
        $row = $getCategorie->updateCategories($idCategorie,$nameCategorie);
        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/adminCategories.php');
            return $row;
        }   
    } 
     
    //DELETE Categorie 
    public function deletCategorie($idDelet){
        $deletCategorie = new CategorieModel();
        $row = $deletCategorie->deletCat($idDelet);
        if(!$row){
            return false;
        }else{
            header('Location:/../src/views/admin/adminCategories.php');
        }   
    } 
}
?>