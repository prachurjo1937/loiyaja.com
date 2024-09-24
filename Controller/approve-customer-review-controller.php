<?php

    require_once('../Model/customer-review-model.php'); 
    
    $id = $_GET['id'];
    
     if(approveReview($id)) header('location:../View/approve-customer-review.php');

?>