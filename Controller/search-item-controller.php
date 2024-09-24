<?php
require_once('../Model/menu-model.php');
    $name=$_REQUEST['name'];
    $result=searchproduct($name);
        if (mysqli_num_rows($result) > 0) {
            echo " <table width=\"85%\" cellspacing=\"0\" cellpadding=\"15\">
        <tr>
            <td>
                Item ID
            </td>
            <td>
                Item Name
            </td>
            <td>
                Stock
            </td>
            <td>
                Action
            </td>
            <hr width=auto><br>
        </tr>";
            while ($w = mysqli_fetch_assoc($result)) {
                $itemid = $w['ItemID'];
                $name = $w['ItemName'];
                $stock = $w['Stock'];
                echo "    
                <tr><td>$itemid</td>
                <td>$name</td>
                <td>$stock</td>
                <td><a href=\"update-stock-page.php?id={$itemid}\">Update Stock</a></td>     
                </tr>";
            }
        } else {
            echo "<tr><td align=\"center\">No product found.</td></tr>";
        }
?>