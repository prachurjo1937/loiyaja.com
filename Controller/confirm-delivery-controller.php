<?php

    require_once('../Model/user-info-model.php');
    require_once('../Model/order-info-model.php');
    require_once('../Model/notification-model.php');
            
    $orderID = $_GET['id'];
    $row2 = getOrderInfo($orderID);
    $cid = getIDByFullname($row2['CustomerName']);
    $deliveryDate = date("d-m-Y");

    $status = confirmDelivery($orderID, $deliveryDate);
    if($status){
        
        addDeliveryBonus($_COOKIE['id']);
        customerNotification($cid, "Your order has been delivered successfully. If you have not recieved it yet, file a complaint to admin", "Customer");
        header('location:confirm-delivery.php');

    } 


?>