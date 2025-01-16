<?php
namespace App\Models;

use App\Classes\Course;

use App\Config\Db;
use PDO;
use PDOException;

class CoursesModel{
    private $conn;

    public function __construct(){
        $this->conn = Db::connect();
    }
  
    public function getCourses(){
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
                        GROUP BY 
                        Courses.id , tags.id ,categories.id,Course_tag.id";


        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $rows =$stmt->fetchAll(PDO::FETCH_ASSOC);
        $Courses=[];
        if($rows){
            foreach($rows as $row){
                $Courses[] = new Course($row["id"], $row["title"], $row["description"], $row["content"], $row["tag_name"], $row["categorie_name"]);
            }
           
            return $Courses; 
        }else
        return false;  
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