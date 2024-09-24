<?php 
    require('../Model/user-info-model.php');

    if(isset($_GET['name'])){
        $result =  searchCustomer($_GET['name']);
        echo json_encode($result);
    }

?>