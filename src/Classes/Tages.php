<?php
namespace App\Classes;


  class Tages{

    private $id;
    private $nameTage;

    public function __construct($id,$nameTage){
        $this->id=$id;
        $this->nameTage=$nameTage;
       
    }
  
public function getId()    { return $this->id; }
public function getNameTage(){ return $this->nameTage; }






}
?>