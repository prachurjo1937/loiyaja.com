<?php
session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
    require_once('../Model/menu-model.php');
  
    $result = getAllItem();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Menu Item</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/allbg.css">
    <link rel="stylesheet" href="CSS/common.css">
</head>
<body>
<?php require_once('header.php');?>
    <br><br>
    <center><h1>Item List</h1>
    <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"1\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    Item Name
                </td>
                <td>
                    Category
                </td>
                <td>
                    Price
                </td>
                <td>
                    Action
                </td>
                <hr width=auto><br>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $id=$w['ItemID'];
                    $name=$w['ItemName'];
                    $category=$w['Category'];
                    $price=$w['Price'];
                    echo "    
                    <tr><td>$name</td>
                    <td>$category</td>
                    <td>$price</td> 
                    <td><a href=\"../Controller/delete-item-controller.php?id={$id}\">Delete Item</a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\">No Item Found</td></tr>";
            }
        ?>
        </table>
        </center>
        <?php require_once('footer.php');?>
</body>
</html>