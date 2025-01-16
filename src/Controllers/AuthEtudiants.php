<?php
namespace App\Controllers;

use App\Models\CoursesModel;

class AuthEtudiants{
 
    public function showCourses(){
        $showcourse= new CoursesModel();
        $resule= $showcourse->getCourses();
       
        if(!$resule){
            return false;
        }else{
            return $resule;
        }  
    }          
}
?>