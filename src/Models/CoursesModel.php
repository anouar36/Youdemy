<?php
namespace App\Models;

use App\Classes\Course;
use App\Classes\Enseignant;
use App\Classes\Etudiants;
use App\Config\Db;
use PDO;
use PDOException;

class CoursesModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Db::connect();
    }

    public function getCourses()
    {
        $sql = "SELECT 
                        Courses.title as title,
                        Courses.id  as id,
                        Courses.description  as description,
                        Courses.content  as content,
                        categories.categorie_name  as categorie_name,
                        GROUP_CONCAT(tags.tag_name)as tag_name
                        FROM 
                            Courses
                        INNER JOIN 
                            categories ON Courses.categorie_id = categories.id
                        INNER JOIN 
                            Course_tag ON Courses.id = Course_tag.Course_id
                        INNER JOIN 
                            tags ON Course_tag.tag_id = tags.id
                            WHERE  Courses.Deleted = 'false'
                        GROUP BY 
                        Courses.id  ,categories.id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Courses = [];
        if ($rows) {
            foreach ($rows as $row) {
                $Courses[] = new Course($row['id'], $row['title'], $row['description'], $row['content'], $row['tag_name'], $row['categorie_name']);
            }

            return $Courses;
        } else
            return false;
    }

    public function getCoursesEn($idEns)
    {
        $sql = "SELECT 
                Courses.title as title,
                Courses.id  as id,
                Courses.description  as description,
                Courses.content  as content,
                categories.categorie_name  as categorie_name,
                GROUP_CONCAT(tags.tag_name)as tag_name
                FROM 
                    Courses
                INNER JOIN 
                    categories ON Courses.categorie_id = categories.id
                INNER JOIN 
                    Course_tag ON Courses.id = Course_tag.Course_id
                INNER JOIN 
                    tags ON Course_tag.tag_id = tags.id
                    WHERE Courses.enseignant_id=:idEns and Courses.Deleted = 'false'
                GROUP BY 
                Courses.id  ,categories.id;";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('idEns', $idEns);

        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Courses = [];
        if ($rows) {
            foreach ($rows as $row) {
                $Courses[] = new Course($row['id'], $row['title'], $row['description'], $row['content'], $row['tag_name'], $row['categorie_name']);
               
            }
            return $Courses;
        } else
            return false;
    }

    public function saveCourses($idCourse, $idEtud)
    {
        
        $sql = ("INSERT INTO Course_Etudiant
            (Course_Etudiant.Etudiant_id,Course_Etudiant.Course_id,Course_Etudiant.Deleted)
             VALUES(:idEtud,:idCours,'false')");

        $stmt = $this->conn->prepare($sql);
        $stmt->BindParam('idEtud', $idEtud);
        $stmt->BindParam('idCours', $idCourse);
        $Resulte = $stmt->execute();
        if (!$Resulte)
            return false;
        else
            return true;
    }

    public function desplaysHestorique($idEtud)
    {
        $sql = "SELECT 
        Courses.id AS id,
        Courses.title AS title,
        Courses.description AS description,
        Courses.content AS content,
        SUBSTRING_INDEX(GROUP_CONCAT(tags.tag_name), ',', 1) AS tag, 
        categories.categorie_name AS categorie
        FROM Courses
        INNER JOIN Course_Etudiant ON Courses.id = Course_Etudiant.Course_id
        INNER JOIN Etudiants ON Etudiants.id = Course_Etudiant.Etudiant_id
        INNER JOIN categories ON Courses.categorie_id = categories.id
        INNER JOIN Course_tag ON Courses.id = Course_tag.Course_id
        INNER JOIN tags ON tags.id = Course_tag.tag_id  
        WHERE 
            Etudiants.id = :idEtudeient and  Course_Etudiant.Deleted = 'false'
        GROUP BY
            Courses.id;";
 
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('idEtudeient', $idEtud);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $couserH = [];
        if (!$rows)
            return false;
        else
            foreach ($rows as $row) {
                $couserH[] = new Course($row['id'], $row['title'], $row['description'], $row['content'], $row['tag'], $row['categorie']);
            }
        return $couserH;
    }

    public function getIdenseignant($idUser)
    {
        $sql = 'SELECT Enseignants.id as id FROM Enseignants WHERE Enseignants.user_id=:idUser;';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam('idUser', $idUser);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$resulte) {
            return false;
        } else {
            return $idEnsei = new Enseignant($resulte['id']);
        }
    }

    public function getEtud($idUser)
    {
        
        $sql = 'SELECT Etudiants.id as id FROM Etudiants WHERE Etudiants.user_id = :iduser;';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':iduser',$idUser);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$resulte) {
            return false;
        } else {
            return $idEtud = new Etudiants($resulte['id']);
        }
    }

    public function InsertCours($title, $url, $description, $enseignant_id, $idcategory)
    {
        $sql = 'INSERT INTO Courses (title, description, content, enseignant_id, categorie_id) 
                VALUES (:title, :description, :content, :enseignant_id, :categorie_id);';

        $stmt = $this->conn->prepare($sql);

        $stmt->BindParam('title', $title);
        $stmt->BindParam('content', $url);
        $stmt->BindParam('description', $description);
        $stmt->BindParam('enseignant_id', $enseignant_id);
        $stmt->BindParam('categorie_id', $idcategory);

        $resulte = $stmt->execute();
        if (!$resulte) {
            return false;
        } else {
            return true;
        }
    }

    public function getIdCourse($description, $url)
    {
        $sql = 'SELECT Courses.id as id FROM Courses
               WHERE Courses.description = :description  and Courses.content=:url';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':url', $url);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$resulte) {
            return false;
        } else {
            return $idCours = new Course($resulte['id'], '', '', '', '', '');
        }
    }

    public function InsertTagCourse($idCourse, $tags)
    {
        $sql = 'INSERT INTO Course_tag (Course_id, tag_id) VALUES (:course_id, :tag_id)';
        $stmt = $this->conn->prepare($sql);

        foreach ($tags as $tagId) {
            $stmt->bindParam(':course_id', $idCourse, PDO::PARAM_INT);
            $stmt->bindParam(':tag_id', $tagId, PDO::PARAM_INT);
            $stmt->execute();
        }

        return true;
    }

    public function softeDelet($idCours)
    {
        $sql = "UPDATE Course_Etudiant SET Course_Etudiant.Deleted = 'true' WHERE  Course_Etudiant.Course_id = :course_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':course_id', $idCours);
        $stmt->execute();

        return true;
    }

    public function DeletCours($idCours, $idEns)
    {
        $sql = "UPDATE Courses SET Courses.Deleted = 'true' WHERE  Courses.id = :course_id and Courses.enseignant_id=:id_endeignants";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':course_id', $idCours);
        $stmt->bindParam(':id_endeignants', $idEns);
        $stmt->execute();

        return true;
    }

    public function GetDataOfTheCours($ideCours)
    {
        $sql = 'SELECT 
                Courses.title as title,
                Courses.id  as id,
                Courses.description  as description,
                Courses.content  as content,
                categories.id  as idcategorie,
                GROUP_CONCAT(tags.id)as idtag
                FROM 
                    Courses
                INNER JOIN 
                    categories ON Courses.categorie_id = categories.id
                INNER JOIN 
                    Course_tag ON Courses.id = Course_tag.Course_id
                INNER JOIN 
                    tags ON Course_tag.tag_id = tags.id
                    WHERE Courses.id =:course_id
                GROUP BY 
                Courses.id  ,categories.id';

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':course_id',$ideCours);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$resulte) {
            return false;
        } else {
            
            return $couseUpdat = new Course($resulte['id'], $resulte['title'], $resulte['description'], $resulte['content'], $resulte['idtag'], $resulte['idcategorie']);
        }
    }

    public function update($idCours,$title, $url, $description ,$idcategory){
        $sql = "UPDATE Courses SET title = :title , content = :content , description= :description,
        categorie_id=:categorie_id WHERE Courses.id=:idCours";
        
        $stmt=$this->conn->prepare($sql);
        $stmt->bindParam(':idCours',$idCours);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':content',$url);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':categorie_id',$idcategory);
        $result=$stmt->execute();
         if(!$result){
            return false;
         }else{
            return true;
         }
    }
    public function UpDateTages($idCours,$idtags){
        $sql = 'UPDATE Course_tag SET tag_id =:tag_id WHERE Course_id=:Course_id;';

        $stmt=$this->conn->prepare($sql);
        foreach($idtags as $tag){
          $stmt->bindParam(':tag_id',$tag);
          $stmt->bindParam(':Course_id',$idCours);
          $resultUpdateTag=$stmt->execute();    
        }
        if(!$resultUpdateTag){
            return false;
        }else{
            return true;
        }


    }
}

//    //ADD NEW categories
//     public function addCategorie($nameCategorie){
//         $sql = "INSERT INTO `categories` (categorie_name) value(:nameCategorie)";

//         $stmt = $this->conn->prepare($sql);
//         $stmt->BindParam(':nameCategorie',$nameCategorie);
//         $resulte=$stmt->execute();
//         if($resulte){
//             return $resulte;
//         }else
//         return false;
//     }

//     //FOR UPDATE Categorie
//     public function getCategori($idCategori){
//         $sql='SELECT * FROM categories WHERE id =:id';

//         $stmt= $this->conn->prepare($sql);
//         $stmt->bindParam(":id", $idCategori);
//         $stmt->execute();
//         $row=$stmt->fetch(PDO::FETCH_ASSOC);
//         if(!$row){
//             return false;
//         } else {
//             return $row = new categories('',$row['categorie_name']);
//         }
//     }
//     public function updateCategories($idCategorie,$nameCategorie){
//         $sql='UPDATE categories SET categorie_name=:name WHERE id=:id; ';

//         $stmt= $this->conn->prepare($sql);
//         $stmt->bindParam(":name",$nameCategorie);
//         $stmt->bindParam(":id",$idCategorie);
//         $row=$stmt->execute();
//         if($row){
//             return true;
//         }else{
//             return false;
//         }
//     }

//     //DELETE TAGE
//     public function deletCat($idDelet){
//         $sql = "DELETE FROM categories WHERE id = :idDelet";

//         $stmt = $this->conn->prepare($sql);
//         $stmt->BindParam(":idDelet",$idDelet);
//         $resulte=$stmt->execute();
//         if($resulte){
//          return $resulte;
//         }else
//          return false;
//     }
// }
?>