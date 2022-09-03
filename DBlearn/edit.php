<?php
require 'config.php';

$info = [];
$id = filter_input(INPUT_GET, 'id');

if($id){

    $sql = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){

        $info = $sql->fetch();

    } else{
        header("Location: index.php");
        exit;
    }
} else{
    header("Location: index.php");
    exit;
}

?>

<h1>Edit User</h1>

<form method="POST" action="edit_action.php" >
    <input type="hidden" name="id" value="<?=$info['id'];?>" />
    <label>
        Name:
        <input type="text" name="name" value="<?=$info['name'];?>"/>
    </label><br/><br/>
    <label>
        E-mail:
        <input type="email" name="email" value="<?=$info['email'];?>" />
    </label><br/><br/>
    
    <input type="submit" value="Save" />
</form>
