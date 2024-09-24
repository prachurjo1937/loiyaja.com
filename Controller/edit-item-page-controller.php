<?php 

    require_once('../Model/menu-model.php');
    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $id = $_GET['id'];
    $itemName = sanitize($_POST['itemName']);
    $category = sanitize($_POST['category']);
    $price = sanitize($_POST['price']);

    if(empty($itemName)){
        header('location:../View/edit-item-page.php?err=itemNameEmpty&id='.$id); 
        exit();
    }
    if(empty($category)){
        header('location:../View/edit-item-page.php?err=categoryEmpty&id='.$id); 
        exit();
    }
    if(empty($price)){
        header('location:../View/edit-item-page.php?err=priceEmpty&id='.$id); 
        exit();
    }

    if(!preg_match("/^[a-zA-Z-' ]*$/", $itemName)) {
        header('location:../View/edit-item-page.php?err=itemNameInvalid&id='.$id); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/", $category)) {
        header('location:../View/edit-item-page.php?err=categoryInvalid&id='.$id); 
        exit();
    }

    if(is_numeric($price)){}
    else {
        header('location:../View/edit-item-page.php?err=priceInvalid&id='.$id); 
        exit();
    }
    
    
    $status = updateItemInfo($id, $itemName, $category, $price);
    if($status) header('location:../View/edit-item-page.php?success=updated&id='.$id);

?>