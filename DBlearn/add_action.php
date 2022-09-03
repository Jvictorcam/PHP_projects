<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($email && $name){

    //$pdo->query("INSERT INTO usuarios (name, email) VALUES ('$name', '$email')");
    $sql = $pdo->prepare("INSERT INTO users (name, email) VALUES(:name, :email)");
    $sql->bindValue(':name',$name);
    $sql->bindParam(':email',$email);
    $sql->execute();
 
    header("Location: index.php");
    exit;
}
else{
    header("Location: add.php");
    exit;
}