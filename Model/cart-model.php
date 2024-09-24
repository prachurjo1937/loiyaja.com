<?php

    require_once('database.php');

    $row;
    function addToCart($itemID, $userID, $quantity, $price){

        $con = dbConnection();
        $sql = $con -> prepare("insert into Cart values('', ?, ?, ?, ?)");
        $sql -> bind_param("ssdd", $itemID, $userID, $quantity, $price);

        if($sql -> execute()) return true;
        else return false;
        
    }

    function cartInfo($userID){

        $con=dbConnection();
        $sql="select * from Cart where UserID = '$userID'";

        $result=mysqli_query($con,$sql);

        return $result;
        
    }

    function getCart($cartID){

        $con=dbConnection();
        $sql="select * from Cart where CartID = '$cartID'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function removeFromCart($id){

        $con = dbConnection();
        $sql = "delete from Cart where CartID = '$id'";
             
        if(mysqli_query($con,$sql)) return true;
        else return false; 

    }

    function getTotalBill($id){

        $con = dbConnection();
        $sql = "select sum(Price) as sum from Cart where UserID = '{$id}';";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['sum'];

    }

    function clearCart($id){

        $con = dbConnection();
        $sql = "delete from Cart where UserID = '$id'";
             
        if(mysqli_query($con,$sql)) return true;
        else return false; 

    }

?>