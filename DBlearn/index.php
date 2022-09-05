<?php
require 'config.php';
require 'DAO/UserDAOMySql.php';

$userDAO = new UserDAOMySql($pdo);
$data = $userDAO->findAll();
?> 

<a href="add.php"> Add User</a><br/><br/>
  
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>OPTIONS</th>
    </tr>
    
    <?php foreach($data as $user): ?>
        <tr>
            
            <td><center><?=$user->getId();?></center></td>
            <td><center><?=$user->getName();?></center></td>
            <td><center><?=$user->getEmail();?></center></td>
            <td><center>
                <a href="edit.php?id=<?=$user->getId();?>" > [Edit] </a>
                <a href="delete_action.php?id=<?=$user->getId();?>" onclick="return confirm('Are you sure you want to delete this?')" > [Delete] </a> 
            </center></td>
            
        </tr>
    <?php endforeach; ?>
</table>