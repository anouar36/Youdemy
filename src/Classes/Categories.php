<?php
namespace App\Classes;


  class categories{

    private $id;
    private $nameCategorie;

    public function __construct($id,$nameCategorie){
        $this->id=$id;
        $this->nameCategorie=$nameCategorie;
       
    }
  
public function getId()    { return $this->id; }
public function getNameCategorie(){ return $this->nameCategorie; }






}
?>