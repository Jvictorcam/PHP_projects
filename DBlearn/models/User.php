<?php
class User{
    private $id;
    private $name;
    private $email;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = trim($id);        
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = ucwords($name);
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = strtolower($email);
    }
}

interface UserDAO{
    public function add(User $u);
    public function findAll();
    public function findById($id);
    public function update(User $u);
    public function delete($id);
}