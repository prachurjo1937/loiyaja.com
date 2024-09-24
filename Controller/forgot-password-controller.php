<?php

require_once('../Model/user-info-model.php');
session_start();

if(isset($_POST['submit'])){

    $mail = $_POST['email'];

    if(empty($mail)) {
        header('location:../View/forgot-password.php?err=empty');
        exit();
    }
    if(uniqueEmail($mail)) {
        header('location:../View/forgot-password.php?err=notFound');
        exit();
    }

    $_SESSION['mail'] = $mail;

    header('location:../View/change-password.php');

}


?>