<?php

    require_once('../Model/user-info-model.php');
    
    $id = $_COOKIE['id'];
    $src = $_FILES['myfile']['tmp_name'];

    if(empty($src)){

        header('location:../View/update-pfp.php?err=empty');
        exit();

    }

    $fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
    $des = "../Uploads/Images/".$_FILES['myfile']['name'];

    if(move_uploaded_file($src, $des)){ 

        updateProfilePicture($fileName, $id);
        header('location:../View/update-pfp.php?success=uploaded');
        exit();

    }
    else{
        header('location:../View/update-pfp.php?err=failed');
        exit();
    }


?>