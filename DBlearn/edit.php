<?php
require 'config.php';
require 'DAO/UserDAOMySql.php';

$userDAO = new UserDAOMySql($pdo);

$user = false;

$id = filter_input(INPUT_GET, 'id');
if($id){
    $user = $userDAO->findById($id);
}
if($user === false){
    header("Location: index.php");
    exit;
}
?>

<h1>User Edit</h1>

<form method="POST" action="edit_action.php">
    <input type="hidden" name="id" value="<?=$user->getId();?>" />

    <label>
        Name:
        <input type="text" name="name" value="<?=$user->getName();?>" placeholder="Name" />
    </label><br/><br/>

    <label>
        Email:
        <input type="text" name="email" value="<?=$user->getEmail();?>" placeholder="Email" />
    </label><br/><br/>
    <input type="submit" value="Save" />
</form>