<?php

    session_start();
    if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=signInFirst');
    require_once('../model/user-info-model.php');

    $id = $_COOKIE['id'];
    $row=  userInfo($id);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Home</title>
    
    <link rel="stylesheet" href="css/customer-home.css">
    <link rel="stylesheet" href="css/link.css">
    <link rel="stylesheet" href="css/girlchef.css">
    <link rel="stylesheet" href="css/return.css">

    <style>
     tr{background-color: Lavender;
    }
    </style>
</head>
<body>

<?php require 'header.php'; ?>
<center><div class="colorful-text">Welcome to our Restaurant</div></center>

    <p align="right"><?php echo "<img src=\" ../{$row['ProfilePicture']} \" width=\"60px\">"; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="c"href="profile.php"><button name="c">Profile</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="c" href="../controller/logout-controller.php"><button name="c">Logout</button></a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
    

<br> <br>
        <tr>
            <td>
                <center><a class="b" href="menu.php"><button name="b">Place Order</button></a></center>
                <br><br>
                <center><a class="b" href="cart.php"><button name="b">Cart</button></a></center>
                <br><br>
                <center><a class = "b"href="notification.php"><button name="b">Notification</button></a></center>
                <br><br>
                <center><a class="b" href="order-history.php"><button name="b">Order History</button></a></center>
                <br><br>
                <center><a class="b" href="menu.php"><button name="b">Reviews</button></a></center>
                <br><br>
                <center><a class="b" href="complaint.php"><button name="b">File a complaint to Admin</button></a></center>
            </td>
        </tr>
    </table>
    <?php require 'footer.php'; ?>
</body>
</html>