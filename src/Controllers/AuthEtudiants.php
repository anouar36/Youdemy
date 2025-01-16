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

    public function EnrollNow($idEtud,$idCourse){
        $EnrollNow = new CoursesModel();
        $resule=$EnrollNow->saveCourses($idEtud,$idCourse);
        if(!$resule)
        return false;
        else
        return true;
    }

    public function showHestorique(){
        $EnrollNow = new CoursesModel();
        $resule=$EnrollNow->desplaysHestorique();
        if(!$resule)
        return false;
        else
        return $resule;
    }
}
?>