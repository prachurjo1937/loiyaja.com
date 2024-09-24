<?php

    require_once('database.php');

    $row;

    function addItem($itemName, $category, $price, $pic){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into Menu values('', ? , ?, 0, ?, ?)");
        $sql -> bind_param("ssis", $itemName, $category, $price, $pic);

        if($sql -> execute()) return true;
        else return false;
        
    }

   

    function numberOfItem(){

        $con = dbConnection();
        $sql = "select * from Menu";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function itemInfo($id){

        $con=dbConnection();
        $sql="select * from Menu where ItemID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }
    function updateItemInfo($id, $itemName, $category, $price){

        $con = dbConnection();
        $sql = $con -> prepare ("update Menu set ItemName = ?, Category = ?, Price = ? where ItemID = ?");
        $sql -> bind_param("ssss", $itemName, $category, $price, $id);     

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

    function deleteItem($id){

        $con = dbConnection();
        $sql = "delete from Menu where ItemID = '$id'";
             
        if(mysqli_query($con,$sql)) return true;
        else return false; 

    }

    function getAllItem(){

        $con = dbConnection();
        $sql = "select * from Menu";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function updateStock($id, $stock){

        $con=dbConnection();
        $sql = $con -> prepare("update Menu set Stock = ? where ItemID = ?");
        $sql -> bind_param("is", $stock, $id); 

        if($sql -> execute()===true) return true;
        else return false; 

    }

    function getItemNameByID($id){

        $con = dbConnection();
        $sql = "select ItemName from Menu where ItemID = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['ItemName'];

    }
    function searchproduct($name){

        $con = dbConnection();
        $sql = "select * from Menu where ItemName Like '%$name%'";
        $result = mysqli_query($con,$sql);
        return $result;
    }


?>