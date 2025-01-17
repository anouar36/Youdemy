<?php
namespace App\Controllers;

use App\Models\TageModel;
use App\Models\CategorieModel;
use App\Models\CoursesModel;

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

    public function pushCours($title, $url, $description, $userid, $idtags,$idcategory){
        $result = new CoursesModel();
        $enseignant_id=$result->getIdenseignant($userid)->getId();
        $course =$result->InsertCours($title, $url, $description,$enseignant_id, $idcategory);
        $idCourse=$result->getIdCourse($description,$url)->getId();
        $tag_course=$result->InsertTagCourse($idCourse,$idtags);
    }

    public function showCoursesEn($idUser){
        $result= new CoursesModel();
        $idEns=$result->getIdenseignant($idUser)->getId();
        $resule= $result->getCoursesEn($idEns);
       
        if(!$resule){
            return false;
        }else{
            return $resule;
        }  
    }  

//sheck this function

    public function EnrollNow($idCourse,$idUser){

        $EnrollNow = new CoursesModel();
        $idEtud=$EnrollNow->getEtud($idUser)->getId();
        $resule=$EnrollNow->saveCourses($idCourse,$idEtud);
        if(!$resule)
        return false;
        else
        return true;
    }
 
//     public function sevCourse($idCourse,$idUser){
//         $saveCourse = new CoursesModel();
//         $idEtude=$saveCourse->getEtud($idUser);
//         $resulte=saveCourse->saveCourses($idCourse,$idEtude);
//         if(!$resulte){
//             return false;
//         }else{
//             return true;
//         }
        
// }
}
?>