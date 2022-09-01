<?php session_start(); ?>

<form method="POST" action="receiver.php" enctype="multipart/form-data">
    <input type="file" name="usrfile" />
    <input type="submit" value="Send" />
    <br/>
</form>

<?php 
echo $_SESSION['warn'] ?? '';
session_unset();
?>


