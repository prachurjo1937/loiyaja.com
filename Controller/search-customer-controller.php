<?php 

require_once('../Model/user-info-model.php');
    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }  

    $search = sanitize($_POST['search']); 

    if(empty($search)) {
        header('location:../View/view-all-customer.php');
        exit;
    }

    header('location:../View/view-all-customer.php?search='.$search);

?>