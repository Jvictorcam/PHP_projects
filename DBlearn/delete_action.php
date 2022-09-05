<?php
    require_once 'config.php';
    require_once 'DAO/UserDAOMySql.php';

    $userDAO = new UserDAOMySql($pdo);

    $id = filter_input(INPUT_GET, 'id');

    if($id){
        $userDAO->delete($id);
        
        header("Location: index.php");
        exit;
    }
