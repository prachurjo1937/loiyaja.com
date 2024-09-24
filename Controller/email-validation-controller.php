<?php 

    require_once('../Model/user-info-model.php');

    $email = $_REQUEST['email'];
    $status = uniqueEmail($email);

    if ($status === false) echo "This email already belongs to another account<br>";
    else echo "This email is available<br>";

?>