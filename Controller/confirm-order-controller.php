<?php

    require_once('../model/user-info-model.php');
    require_once('../model/order-info-model.php');
    require_once('../model/cart-model.php');
    require_once('../model/notification-model.php');
            
    $id = $_COOKIE['id'];
    $row = userInfo($id);


    $password = $_POST['password'];

    if(empty($password)){
        header('location:../view/confirm-order.php?err=empty'); 
        exit();
    }

    if($password != $row['Password']){
        header('location:../view/confirm-order.php?err=mismatch'); 
        exit();
    }

    $customerName = $row['Fullname'];
    $deliveryManName = "N/A";
    $address = $row['Address'];
    $bill = getTotalBill($id);
    $deliveryDate = "Not Delivered Yet";
    $orderDate = date("d-m-Y");
    $orderStatus = "Pending";

    $status = createOrder($customerName, $deliveryManName, $address, $bill, $deliveryDate, $orderDate, $orderStatus);
    if($status){

        clearCart($id);
        customerNotification($id, "Thank you for ordering. We will inform you when a delivery man is assigned.", "Customer");
        deliverymanNotification($id, "A new order has been placed. Please check order list for details", "Delivery Man");
        header('location:../view/confirm-order.php?success=confirmed');

    } 


?>