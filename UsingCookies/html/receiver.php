<?php
session_start();
require_once('header.php');
$name = filter_input(INPUT_POST, 'usrname', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'usremail', FILTER_VALIDATE_EMAIL);
$passwd = filter_input(INPUT_POST, 'usrpasswd', FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $email && $passwd){

    setcookie('usrname', $name, time() + (86400 * 30));
    setcookie('usrpasswd', $passwd, time() + (86400 * 30));
    setcookie('usremail', $email, time() + (86400 * 30));


}
else{
    $_SESSION['warn'] = "Please enter the fields correctly\n";

   
}

header("Location: index.php");
exit();
?>