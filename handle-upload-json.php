<?php 
session_start();
if(isset($_POST['submit'])){
    $file=$_FILES['myfile'];

    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmp = $file['tmp_name'];
    $fileErr = $file['error'];
    $fileSize = $file['size'];
    $ext=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    $errors=[];

    //validation
    if($fileErr != 0){
        $errors[]="Error";
    }elseif(!in_array($ext,["json"])){
        $errors[]="Invalid file type";
    }elseif(!in_array($ext,["json"])){
        $errors[]="Invalid file type";
    }

    if(empty($errors)){
        $randomStr=uniqid();
        $fileNewName= "$randomStr.$ext";
        move_uploaded_file($fileTmp,"uploads/$fileNewName");
    }

    $myfile = fopen("uploads/".$fileNewName,"r");
    $myfiledata=fread($myfile,$fileSize);
    $myfiledata=json_decode($myfiledata);
    $_SESSION['myfile']=$myfiledata;

    header("location: display.php");

   
}

?>