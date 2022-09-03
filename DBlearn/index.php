<a href="add.php">Adicionar</a>

<?php
require 'config.php';
$sql = $pdo->query('SELECT * FROM users');
$data = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    
    <?php foreach($data as $user): ?>
    <tr>
        <?php foreach($user as $subvalue): ?>
            <td><?=$subvalue?></td>
        <?php endforeach; ?> 
        <td><a href="delete_action.php">Delete</a></td>    
    <tr>
    <?php endforeach; ?>

        



</table>