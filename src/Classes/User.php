<?php
namespace App\Classes;


  class User{

    private $id;
    private $email;
    private $password;
    private $role;

    public function __construct($id,$username,$email,$password,$role){
        $this->id=$id;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
    }

public function getUsername(){ return $this->username; }
public function getEmail   (){ return $this->email; }
public function getPassword(){ return $this->password; }
public function getRole    (){ return $this->role; }





}
?>