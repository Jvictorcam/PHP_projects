<?php
    require_once 'config.php';
    require_once 'models/User.php';
    require_once 'DAO/UserDAOMySql.php';

    $userDAO = new UserDAOMySql($pdo);

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if($name && $email){
    
        if($userDAO->findByEmail($email) == false){
            $newUser = new User();
            $newUser->setName($name);
            $newUser->setEmail($email);

            $userDAO->add($newUser);

            header("Location: index.php");
            exit;
        } else{
            header("Location: add.php");
            exit;
        }
    } else{
        header("Location: add.php");
        exit;
    }
