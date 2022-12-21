<?php
include_once('conn.php');
$gid = $_POST['idd'];
foreach($_FILES['file']['name'] as $key=>$val){
    $file_name = $_FILES['file']['name'][$key];
 
    // get file extension
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
 
    // get filename without extension
    $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);
 
    if (!file_exists(getcwd(). '/uploads')) {
        mkdir(getcwd(). '/uploads', 0777);
    }
 
    $filename_to_store = $filenamewithoutextension. '_' .uniqid(). '.' .$ext;
    $filest = "uploads/".$filename_to_store;
    if(move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd(). '/uploads/'.$filename_to_store)){
        //we shall now save it in te database
        $ezzzy->runQuery("INSERT into gallerypic(gid,padd) VALUES('$gid','$filest')");        
    }
}
echo "File(s) uploaded successfully";
die;