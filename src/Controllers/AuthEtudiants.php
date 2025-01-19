<?php
namespace App\Controllers;
use App\Models\CoursesModel;
use App\Classes\User;

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
        $idUser=$_SESSION['id'];
         
        $EnrollNow = new CoursesModel();
        $idEtud=$EnrollNow->getEtud($idUser)->getId();
        $resule=$EnrollNow->saveCourses($idCourse,$idEtud);
        if(!$resule)
        return false;
        else
        return true;
    }

    public function showHestorique($idEtud){
        $EnrollNow = new CoursesModel();
        $idEtud=$EnrollNow->getEtud($idEtud)->getId();
        $resule=$EnrollNow->desplaysHestorique($idEtud);
        if(!$resule)
        return false;
        else
        return $resule;
    }
    
    public function deletCourse($idCours){
        
        $Delet = new CoursesModel();
        $resulte =$Delet->softeDelet($idCours);
        if(!$resulte){
            return false;
        }else{
            header('Location:../etudiant/Dashboard.php');
            return true ;
        }

    }
}
?>