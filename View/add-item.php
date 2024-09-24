<?php
session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
$nameMsg = $categoryMsg = $priceMsg = $picMsg = '';

if (isset($_GET['err'])) {

  $err_msg = $_GET['err'];
  
  switch ($err_msg) {
    case 'itemNameEmpty': {
        $nameMsg = "Item name can not be empty.";
        break;
      }
    case 'categoryEmpty': {
        $categoryMsg = "Category can not be empty.";
        break;
      }
    case 'priceEmpty': {
        $priceMsg = "Price can not be empty.";
        break;
      }
      case 'picEmpty': {
        $picMsg = "Item picture can not be empty.";
        break;
      }
      case 'itemNameInvalid': {
        $nameMsg = "Item name invalid.";
        break;
      }
    case 'categoryInvalid': {
        $categoryMsg = "Category invalid.";
        break;
      }
    case 'priceInvalid': {
        $priceMsg = "Price invalid.";
        break;
      }
  }
}

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'added': {
        $success_msg = "Item added to the menu.";
        break;
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item To The Menu</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/allbg.css">
    <link rel="stylesheet" href="CSS/recruitman.css">
    <script src="JS/add-item.js"></script>
</head>
<body>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/add-item-controller.php" novalidate autocomplete="off" enctype="multipart/form-data" onsubmit="return isValid(this);">                    
                <h1>Add Item</h1>
                    Item Name
                    <input type="text" name="itemName" size="43px">
                    <?php if (strlen($nameMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $nameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="itemNameError"></font><br>
                    Category
                    <input type="text" name="category" size="43px">
                    <?php if (strlen($categoryMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $categoryMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="categoryError"></font><br>
                    Price
                    <input type="text" name="price" size="43px">
                    <?php if (strlen($priceMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $priceMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="priceError"></font><br>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    Item Picture <br><br>
                    <input type="file" name="myfile" accept=".png,.jpg,.jpeg">
                    <?php if (strlen($picMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $picMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="pictureError"></font><br>
                    <button size="250px" name="submit">Add Item</button>
                    <br><br>
                    </form>
            </td>
        </tr>
    </table>
</body>
</html>