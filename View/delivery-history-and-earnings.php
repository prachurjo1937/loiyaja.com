<?php

session_start();
if(!isset($_SESSION['LoggedIn'])) header('location:sign-in.php?err=loginFirst');

    require_once('../Model/order-info-model.php');
    require_once('../Model/user-info-model.php');
  
    $id = $_COOKIE['id'];
    $income = getIncome($_COOKIE['id']);
    $row = userInfo($id);
    $fullname = $row['Fullname'];
    $result = getPersonalDeliveryHistory($fullname);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="external.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery History</title>
</head>
<body>
    <br><br>
    <p class="bonus-message">Total delivery bonus till now: <?php echo $income; ?> [+40BDT for every Delivery]</p>

    <br><br>
    <center><h1>Delivery History</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    <b>Customer Name</b>
                </td>
                <td>
                    <b>Delivery Address</b>
                </td>
                <td>
                    <b>Bill</b>
                </td>
                <td>
                    <b>Delivery Date</b>
                </td>
                <td>
                    <b>Order Date</b>
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $customerName=$w['CustomerName'];
                    $address=$w['Address'];
                    $bill=$w['Bill'];
                    $ddate=$w['DeliveryDate'];
                    $odate=$w['OrderDate'];
                    echo "    
                    <tr><td>$customerName</td>
                    <td>$address</td> 
                    <td>$bill</td>
                    <td>$ddate</td> 
                    <td>$odate</td>      
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Delivery History Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <br>
        <br>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a  href="deliveryman-home.php"><b>Go Back</a></b>
</body>
</body>
</html>