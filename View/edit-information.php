<?php
session_start();
if(!isset($_COOKIE['flag'])) header('location:sign-in.php?err=accessDenied');
    require_once('../Model/user-info-model.php');    
  
    $id = $_COOKIE['id'];
    $row = userInfo($id);

    $fullnameMsg = $emailMsg = $phoneMsg = $addressMsg = $religionMsg =  $usernameMsg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'fullnameEmpty': {
            $fullnameMsg = "Fullname can not be empty.";
            break;
        }
        case 'phoneEmpty': {
            $phoneMsg = "Phone number can not be empty.";
            break;
        }
        case 'addressEmpty': {
            $addressMsg = "Address can not be empty.";
            break;
        }
        case 'emailEmpty': {
            $emailMsg = "Email can not be empty.";
            break;
        }
        case 'dobEmpty': {
            $dobMsg = "Date of birth can not be empty.";
            break;
        }
        case 'religionEmpty': {
            $religionMsg = "Religion can not be empty.";
            break;
        }
        case 'usernameEmpty': {
            $usernameMsg = "Username can not be empty.";
            break;
        }
        case 'fullnameInvalid': {
            $fullnameMsg = "Fullname is not valid.";
            break;
        }
        case 'phoneInvalid': {
            $phoneMsg = "Phone number is not valid.";
            break;
        }
        case 'emailInvalid': {
            $emailMsg = "Email is not valid.";
            break;
        }
        case 'emailExists': {
            $emailMsg = "Email already exists.";
            break;
        }
        case 'usernameInvalid': {
            $usernameMsg = "Username is not valid.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'changed': {
        $success_msg = "Information successfully updated.";
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
    <title>Edit Information</title>
    <link rel="stylesheet" href="CSS/mystyle.css">
    <link rel="stylesheet" href="CSS/profilebg.css">
    <link rel="stylesheet" href="CSS/editinfo.css">
    <script src="JS/edit-information.js"></script>
    <script>
        function checkEmailValidity(email){ 
                if(email === "") return;
                let xhttp = new XMLHttpRequest(); 
                xhttp.open('post','../Controller/email-validation-controller.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('email='+email);
                xhttp.onload=function(){
                    document.getElementById('emailError').innerHTML = this.responseText;
                    if(this.responseText === "This email already belongs to another account<br>") document.getElementById('button').disabled = true;
                    else document.getElementById('button').disabled = false;
                }
            }
    </script>
</head>
<body>

    <table width="23%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/edit-information-controller.php" novalidate autocomplete="off" onsubmit="return isValid(this);">
                    <h1>Edit Information</h1>
                    Fullname
                    <input type="text" name="fullname" size="43px" value= "<?php echo "{$row['Fullname']}"; ?>">
                    <?php if (strlen($fullnameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $fullnameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="fullnameError"></font><br>
                    Phone
                    <input type="text" name="phone" size="43px" value= "<?php echo "{$row['Phone']}"; ?>">
                    <?php if (strlen($phoneMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $phoneMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="phoneError"></font><br>
                    Email
                    <input type="email" name="email" size="43px" value= "<?php echo "{$row['Email']}"; ?>" onkeyup="checkEmailValidity(this.value)">
                    <?php if (strlen($emailMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $emailMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="emailError"></font><br>
                    Address
                    <input type="text" name="address" size="43px" value= "<?php echo "{$row['Address']}"; ?>">
                    <?php if (strlen($addressMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $addressMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="addressError"></font><br>
                    Religion &nbsp;&nbsp;&nbsp;
                    <select name="religion">
                        <option disabled selected hidden value="Not Selected">Choose Your Religion</option>
                        <option value="Islam" <?php if($row['Religion'] == "Islam") echo "selected"; ?>>Islam</option>
                        <option value="Hindu" <?php if($row['Religion'] == "Hindu") echo "selected"; ?>>Hindu</option>
                        <option value="Christian" <?php if($row['Religion'] == "Christian") echo "selected"; ?>>Christian</option>
                    </select>
                    <?php if (strlen($religionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $religionMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="religionError"></font><br>
                    Username
                    <input type="text" name="username" size="43px" value= "<?php echo "{$row['Username']}"; ?>">
                    <?php if (strlen($usernameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $usernameMsg ?></font>
                    <?php } ?>
                    <br><font color="red" align="center" id="usernameError"></font><br>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <font color="green" align="center"><?= $success_msg ?></font>
                        <br><br>
                    <?php } ?>
                    <a href=button><button class="btn search" id="button">Update Information</button></a>
                </form>
            </td>
        </tr>
    </table>
    
</body>
</html>