<?php

    session_start();
    if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');

    require_once('../Model/user-info-model.php');

    $id = $_COOKIE['id'];
    $row = userInfo($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <link rel="stylesheet" href="CSS/style2.css">
    <link rel="stylesheet" href="CSS/adminhome.css">
    <style>
     tr{background-color: Antiquewhite;}
    </style>
</head>
<body>
    <?php require_once('header.php');?>
    <p align="right"><?php echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"40px\">"; ?> &nbsp;&nbsp;&nbsp;&nbsp;
    <select name="profile" onchange="location = this.value;">
        <option disabled selected hidden> <?php echo $row['Username']; ?></option>
        <option value="profile.php">Profile</option>
        <option value="../Controller/logout-controller.php">Log Out</option>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;
    <table width="23%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td align=center>
                <a class="x"href="view-all-customer.php"><button name="x">View All Customer</button></a>
                <br><br>
                <a class="x"href="view-all-customer-order-list.php"><button name="x">View All Customer Order List</button></a>
                <br><br>
                <a class="x"href="add-item.php"><button name="x">Add New Item To The Menu</button></a>
                <br><br>
                <a class="x"href="edit-item.php"><button name="x">Edit Menu Item</button></a>
                <br><br>
                <a class="x"href="delete-item.php"><button name="x">Delete Item From The Menu</button></a>
                <br><br>
                <a class="x"href="notification.php"><button name="x">Notification</button></a>
                <br><br>
                <a class="x"href="customer-complaint.php"><button name="x">Customer Complaint</button></a>
                <br><br>
                <a class="x"href="customer-review.php"><button name="x">Customer Complaint</button></a>
                <br><br>
                <a class="x"href="update-stock.php"><button name="x">Customer Complaint</button></a>
                <br><br>
                <a class="x"href="update-stock-page.php"><button name="x">Customer Complaint</button></a>
                <br><br>



            </td>
        </tr>
    </table>
    <?php require_once('footer.php');?>
</body>
</html>