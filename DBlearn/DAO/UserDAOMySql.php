<?php
require_once 'models/User.php';

class UserDAOMySql implements UserDAO{
    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }

    public function add(User $u){
        $sql = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();
        
        $u->setId($this->pdo->lastInsertId());    
        return $u;
    }
    public function findAll(){
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM users");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            $array = array_map(function($item){
                $u = new User();
                $u->setId($item['id']);
                $u->setName($item['name']);
                $u->setEmail($item['email']);

                return $u;
            }, $data);
            
        }
        
        return $array;

        
    }
    public function findById($id){

    }
    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = new User();

            $u = new User();
            $u->setId($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
         
    }
    public function update(User $u){

    }
    public function delete($id){

    }
}