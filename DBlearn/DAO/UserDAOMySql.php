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
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            
            $u = new User();
            $u->setId($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);

            return $u;
        } else {
            return false;
        }
    }
    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();

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
        $sql = $this->pdo->prepare("UPDATE users SET email = :email, name = :name WHERE id = :id");
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }
    public function delete($id){
        $sql = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }
}