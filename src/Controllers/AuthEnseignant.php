<?php
namespace App\Controllers;

use App\Models\CategorieModel;
use App\Models\CoursesModel;
use App\Models\TageModel;
use App\Models\UserModel;

class AuthEnseignant
{
    public function getTages()
    {
        $result = new TageModel();
        $rows = $result->getTags();
        if (!$rows) {
            return false;
        } else {
            return $rows;
        }
    }

    public function getCategories()
    {
        $result = new CategorieModel();
        $rows = $result->getCategorie();
        if (!$rows) {
            return false;
        } else {
            return $rows;
        }
    }

    public function pushCours($title, $url, $description, $userid, $idtags, $idcategory)
    {
        $result = new CoursesModel();
        $idUser = $_SESSION['id'];

        $enseignant_id = $result->getIdenseignant($idUser)->getId();

        $course = $result->InsertCours($title, $url, $description, $enseignant_id, $idcategory);
        if(!$course){
            $_SESSION['addIssucssf']= false;
            return false; 
        }else{
            $idCourse = $result->getIdCourse($description, $url)->getId();
            $tag_course = $result->InsertTagCourse($idCourse, $idtags);  
        }  
        
       

    }

    public function showCoursesEn()
    {
        $idUser = $_SESSION['id'];

        $result = new CoursesModel();
        $idEns = $result->getIdenseignant($idUser)->getId();
        $resule = $result->getCoursesEn($idEns);

        if (!$resule) {
            return false;
        } else {
            return $resule;
        }
    }

    // sheck this function

    public function EnrollNow($idCourse, $idUser)
    {
        $EnrollNow = new CoursesModel();
        $idEtud = $EnrollNow->getEtud($idUser)->getId();
        $resule = $EnrollNow->saveCourses($idCourse, $idEtud);
        if (!$resule)
            return false;
        else
            return true;
    }

    public function DeletCours($idCours)
    {
        $idUser = $_SESSION['id'];
        $softDelet = new CoursesModel();
        $idEns = $softDelet->getIdenseignant($idUser)->getId();
        $softDelet->DeletCours($idCours, $idEns);
    }

    public function GetCoursFoUpdat($ideCours)
    {
        $updat = new CoursesModel();
        $resule = $updat->GetDataOfTheCours($ideCours);

        if (!$resule) {
            return false;
        } else {
            return $resule;
        };
    }

    public function UpdateCours($idCours, $title, $url, $description, $userid, $idtags, $idcategory)
    {
        $updat = new CoursesModel();
        $resule = $updat->update($idCours, $title, $url, $description, $idcategory);
        if (!$resule) {
            return false;
        } else {
            $resuleTagesUpdat = $updat->UpDateTages($idCours, $idtags);
            if (!$resuleTagesUpdat) {
                return false;
            } else {
                header("Location:../enseignant/UpdateCourse.php?id=$idCours");
                return true;
            }
        }
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