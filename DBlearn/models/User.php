<?php
class User{
    private $id;
    private $name;
    private $email;

    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = $id;        
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = strtolower($email);
    }


}