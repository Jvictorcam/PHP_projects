<?php 
session_start(); 
require_once('header.php');
if (isset($_COOKIE['usrname'])) exit();
?>

<form method="POST" action="receiver.php">
    
    <label>
        Name:
        <br/>
        <input type="text" name="usrname"/>
    </label>
    <br/>
    <br/>

    <label>
        E-mail:
        <br/>
        <input type="text" name="usremail"/>
    <label>
    <br/>
    <br/>

    <label>
        Password:
        <br/>
        <input type="password" name="usrpasswd"/>
    </label>
    <br/>
    <br/>
    <input type="submit" value="Send" />
</form>
?>
<?php 
echo $_SESSION['warn'] ?? ' '; 
session_unset();
?> 