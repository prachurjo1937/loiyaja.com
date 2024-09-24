<?php

    require_once('database.php');

    $row;

    function getPendingReview(){

        $con = dbConnection();
        $sql = "select * from CustomerReview where Status = 'Inactive'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function approveReview($id){

        $con = dbConnection();
        $sql = "update CustomerReview set status = 'Active' where ReviewID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return $result;
        else return false;
        
    }


?>