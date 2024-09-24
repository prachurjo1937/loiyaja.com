<?php
session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
    require_once('../Model/complaint-model.php');

    $result = getAllComplaint();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Complaint</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/allbg.css">
</head>
<body>
<?php require_once('header.php');?>
    <br><br>
    <center><h1>Customer Complaints</h1>
        <?php 
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
               <tr>
               <td>Customer Name</td>
               <td>Complaint</td>
               </tr>
               ";
                while($w=mysqli_fetch_assoc($result)){
                    $name=$w['CustomerName'];
                    $complaint=$w['Complaint'];
                    echo "    
                    <tr>
                    <td>$name</td>
                    <td>$complaint</td>
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Complaints Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <?php require_once('footer.php');?>
</body>
</html>