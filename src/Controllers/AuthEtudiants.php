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
   

    public function EnrollNow($idCourse,$idUser){

        $EnrollNow = new CoursesModel();
        $idEtud=$EnrollNow->getEtud($idUser)->getId();
        $resule=$EnrollNow->saveCourses($idCourse,$idEtud);
        if(!$resule)
        return false;
        else
        return true;
    }

    public function showHestorique($idUser){
        $EnrollNow = new CoursesModel();
        $resulta=$EnrollNow->getEtud($idUser);
        
        $idEtud=$resulta->getId();
    
        $resule=$EnrollNow->desplaysHestorique($idEtud);
        if(!$resule)
        return false;
        else
        return $resule;
    }
    
    public function deletCourse($idCours){
        
        $Delet = new CoursesModel();
        $Delet->softeDelet($idCours);

    }
}
?>