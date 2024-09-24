<?php 
    require('../model/menu-model.php');
    require('../model/user-info-model.php');

    if(isset($_GET['item'])){
        $result =  searchItem($_GET['item']);
        echo json_encode($result);
    }

    if(isset($_REQUEST['email'])){
        echo uniqueEmail($_REQUEST['email']);
    }



?>