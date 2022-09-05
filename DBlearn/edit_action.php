<?php
require 'config.php';
require 'DAO/UserDAOMySql.php';

$userDAO = new UserDAOMySql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $email){
    $user = new User();
    $user->setId($id);
    $user->setName($name);
    $user->setEmail($email);

    $userDAO->update($user);

    header("Location: index.php");
    exit;

} else {
    header("Location: edit.php?id=".$id);
    exit;
}