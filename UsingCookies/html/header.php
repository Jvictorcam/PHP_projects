<h1> Header </h1>
<?php
if(isset($_COOKIE['usrname'])){
    $name = $_COOKIE['usrname'];
    echo "Welcome $name !";

}
?>