<?php
session_start();

function getExt(string $typeext){
    $typeext = explode('/', $typeext);    
    return $typeext[1] ?? ' ';
}

$filetype = getExt($_FILES['usrfile']['type']);

if(in_array($filetype, array('jpeg', 'png', 'jpg'))){
    $filename = 'image'.md5(time().rand(1, 1000)) . '.jpg';
    move_uploaded_file($_FILES['usrfile'], '/files/' . $filename);
    echo '<pre>';
    echo 'File Uploaded Succesfully';
    print_r($_FILES['usrfile']); 
}

else{
    $_SESSION['warn'] = 'Invalid Format, please select a jpg/png file';
    header("Location: index.php");
    exit();
}

?>