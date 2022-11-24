<?php 

$uploaddir = realpath('./') . '/uploads/';
$uploadfile = bin2hex(time()).'.'. pathinfo($_FILES['deposit_image']['name'], 
PATHINFO_EXTENSION);
$uploadfile_folder = $uploaddir . $uploadfile; 
move_uploaded_file($_FILES['deposit_image']['tmp_name'], $uploadfile_folder);

echo $uploadfile; 
           
        
?>