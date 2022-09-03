<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($email && $name){

    $sql = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){
    $sql = $pdo->prepare("INSERT INTO users (name, email) VALUES(:name, :email)");
    $sql->bindValue(':name',$name);
    $sql->bindParam(':email',$email);
    $sql->execute();
 
    header("Location: index.php");
    exit;
    } else{
        $_SESSION['WARN'] = 'This e-mail is already in use';
        header("Location: add.php");
        exit;
    }
}
else{
    header("Location: add.php");
    exit;
}