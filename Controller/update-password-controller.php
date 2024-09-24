<?php

require_once('../Model/user-info-model.php');
function sanitize($data){

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;

}
          
$id=$_COOKIE['id'];
$row=UserInfo($id);

if(isset($_POST['submit'])){

    $prevpassword = sanitize($_POST['prevpassword']);
    $password = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cpassword']);

    if(empty($prevpassword)){
        header('location:../View/update-password.php?err=prevpasswordEmpty'); 
        exit();
    }
    if(empty($password)){
        header('location:../View/update-password.php?err=passwordEmpty'); 
        exit();
    }
    if(empty($cpassword)){
        header('location:../View/update-password.php?err=cpasswordEmpty'); 
        exit();
    }

    if($prevpassword != $row['Password']){
        header('location:../View/update-password.php?err=passwordError'); 
        exit();
    }

    if(strlen($password)<8){
        header('location:../View/update-password.php?err=invalid'); 
        exit();
    }
    
    if($password!=$cpassword){
        header('location:../View/update-password.php?err=mismatch'); 
        exit();
    }


    if(changePassword($id,$password)==true){
        header('location:../View/update-password.php?success=updated'); 
        exit();
    }
}
?>