<?php
session_start();
require_once('../Model/user-info-model.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['Role'];
    $remember;

    if (isset($_POST['rememberMe'])) {
        $remember = "true";
    } else {
        $remember = "false";
    }

    // Validate email and password are not empty
    if (strlen(trim($email)) == 0 || strlen(trim($password)) == 0) {
        header('location:../View/sign-in.php?err=empty');
        return;
    }

    // Call login function
    $status = login($email, $password);

    if ($status !== false) {
        // Set session and cookies for successful login
        $_SESSION["login"] = 1;
        setcookie("id", $status['UserID'], time() + 99999999999, "/");

        if ($remember == "true") {
            setcookie("flag", "true", time() + 999999999, "/");
        } else {
            setcookie("flag", "false", time() + 3600, "/");
        }

        // Redirect based on role
        if ($status['Role'] == "Admin") {
            header('location:../View/admin-home.php');
        } elseif ($status['Role'] == "Customer") {
            $_SESSION['flag'] = true;
            header('location:../View/customer-home.php');
        }
    } else {
        // Incorrect email or password
        header('location:../View/sign-in.php?err=mismatch');
    }
} else {
    header('location:../View/sign-in.php?err=invalid_request');
}
?>
