<?php 

    require_once('../Model/menu-model.php');
    function sanitize($data){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;

    }

    $itemName = sanitize($_POST['itemName']);
    $category = sanitize($_POST['category']);
    $price = sanitize($_POST['price']);
    $src = $_FILES['myfile']['tmp_name'];

    
    if(empty($itemName)){
        header('location:../View/add-item.php?err=itemNameEmpty'); 
        exit();
    }
    if(empty($category)){
        header('location:../View/add-item.php?err=categoryEmpty'); 
        exit();
    }
    if(empty($price)){
        header('location:../View/add-item.php?err=priceEmpty'); 
        exit();
    }
    if(empty($src)){
        header('location:../View/add-item.php?err=picEmpty');
        exit();
    }

    if(!preg_match("/^[a-zA-Z-' ]*$/", $itemName)) {
        header('location:../View/add-item.php?err=itemNameInvalid'); 
        exit();
    }
    if(!preg_match("/^[a-zA-Z-' ]*$/", $category)) {
        header('location:../View/add-item.php?err=categoryInvalid'); 
        exit();
    }

    if(is_numeric($price)){}
    else {
        header('location:../View/add-item.php?err=priceInvalid'); 
        exit();
    }

    $fileName = 'Uploads/Images/'.$_FILES['myfile']['name'];
    $des = "../Uploads/Images/".$_FILES['myfile']['name'];
    move_uploaded_file($src, $des);
    
    
    $status = addItem($itemName, $category, $price, $fileName);
    if($status) header('location:../View/add-item.php?success=added');

?>