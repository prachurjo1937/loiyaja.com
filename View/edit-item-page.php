<?php
session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
require_once('../Model/menu-model.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $row = itemInfo($id);

}

$nameMsg = $categoryMsg = $priceMsg = '';

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
    case 'updated': {
        $success_msg = "Item info updated.";
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
    <title>Edit Item</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/allbg.css">
    <link rel="stylesheet" href="CSS/common.css">
    <script src="JS/edit-item-page.js"></script>
    <style>
     tr{background-color: Wheat;}
    </style>
</head>
<body>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/edit-item-page-controller.php?id=<?php echo $id; ?>" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1>Edit Item</h1>
                    Item Name
                    <input type="text" name="itemName" size="43px" value= "<?php echo "{$row['ItemName']}"; ?>">
                    <?php if (strlen($nameMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $nameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="itemNameError"></font><br>
                    Category
                    <input type="text" name="category" size="43px" value= "<?php echo "{$row['Category']}"; ?>">
                    <?php if (strlen($categoryMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $categoryMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="categoryError"></font><br>
                    Price
                    <input type="text" name="price" size="43px" value= "<?php echo "{$row['Price']}"; ?>">
                    <?php if (strlen($priceMsg) > 0) { ?>
                        <br><br>
                        <font color="red" align="center"><?= $priceMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="priceError"></font><br>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <button size="250px" name="submit">Edit Item Info</button>
                    <br><br>
                    </form>
            </td>
        </tr>
    </table>
</body>
</html>