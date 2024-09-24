<?php

    require_once('database.php');

    $row;
    function getAllComplaint(){

        $con = dbConnection();
        $sql = "select * from Complaint;";
    
        $result = mysqli_query($con,$sql);
        return $result;

    }

?>