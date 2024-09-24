<?php

    require_once('../Model/menu-model.php');

    $id = $_GET['id'];

    $status = deleteItem($id);
    if($status) header('location:../View/delete-item.php');


?>