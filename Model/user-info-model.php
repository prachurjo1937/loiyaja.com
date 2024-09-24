<?php

    require_once('database.php');

    $row;

    function login($email, $password) {
    $con = dbConnection();
    
    // Prepare the SQL statement to get the user by email and password
    $sql = $con->prepare("SELECT * FROM UserInfo WHERE email = ? AND password = ?");
    
    // Bind both the email and password parameters
    $sql->bind_param("ss", $email, $password); // "ss" means two string parameters
    
    // Execute the query
    $sql->execute();
    
    $result = $sql->get_result();
    
    // Check if a user with the email and password exists
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        // Check the user's role
        if ($row['Role'] === "Admin" || $row['Role'] === "Customer") {
            $sql->close();
            $con->close();
            
            return $row; // Return user data if login is successful
        }
    }
    
    // Close statement and connection if email not found or any other failure
    $sql->close();
    $con->close();
    
    return false; // Invalid login
}



    function addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role){

        $con = dbConnection();
        $sql = $con -> prepare ("insert into UserInfo values('', ?, ?, ?, ?, ?, ?, ?, ?, 'Uploads/Images/default_pfp.png', ?, 'Active')");
        $sql -> bind_param("sssssssss", $fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role);

        if($sql -> execute()) return true;
        else return false;
        
    }
    
    function uniqueEmail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("select email from userinfo where email = ? ");
        $sql -> bind_param("s", $email);
        $sql -> execute();
        $result = $sql -> get_result();
        $count = mysqli_num_rows($result);

        if($count > 0) return false;
        else return true; 
        
    }

    function getUserByMail($email){

        $con = dbConnection();
        $sql = $con -> prepare ("Select * from UserInfo where Email = ?");
        $sql -> bind_param("s", $email);
        $sql -> execute();
             
        $result = $sql -> get_result();
        $row = mysqli_fetch_assoc($result);
        return $row;
        
    }

    function changePassword($id, $newpass){

        $con=dbConnection();
        $sql = $con -> prepare ("update UserInfo set Password = ? where UserID = ?");
        $sql -> bind_param("ss", $newpass, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

    function userInfo($id){

        $con=dbConnection();
        $sql="select* from UserInfo where UserID='$id'";

        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row;
        
    }

    function updateProfilePicture($imagename, $id){

        $con = dbConnection();
        $sql = $con -> prepare ("update UserInfo set ProfilePicture = ? where UserID = ?");
        $sql -> bind_param("ss", $imagename, $id);
             
        if($sql -> execute()===true) return true;
        else return false; 
        
    }

    function updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username){

        $con = dbConnection();
        $sql = $con -> prepare ("update UserInfo set Fullname = ?, Username = ?, Phone = ?, Email = ?, Religion = ?, Address = ? where UserID = ?");
        $sql -> bind_param("sssssss", $fullname, $username, $phone, $email, $religion, $address, $id);

        if($sql -> execute()===true) return true;
        else return false; 
        
    }

    function getAllDeliveryPerson(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role = 'Delivery Man' and status = 'Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function getAllCustomer(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role = 'Customer' and status = 'Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function getAllManager(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role = 'Manager' and status = 'Active'";

        $result = mysqli_query($con,$sql);
        return $result;

    }

    function numberOfCustomer(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role='Customer' and status='Active'";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function numberOfDeliveryMan(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Role='Delivery Man' and status='Active'";

        $result = mysqli_query($con,$sql);
        return mysqli_num_rows($result);

    }

    function getUsernameByID($id){

        $con = dbConnection();
        $sql = "select Username from UserInfo where UserID = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);

        return $row['Username'];

    }

    function banCustomer($id){

        $con = dbConnection();
        $sql = "update UserInfo set status = 'Inactive' where UserID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return true;
        else return false;
        
    }
    function acceptResign($id){

        $con = dbConnection();
        $sql = "update UserInfo set status = 'Inactive' where UserID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return true;
        else return false;
        
    }
    function rejectResign($id){

        $con = dbConnection();
        $sql = "update UserInfo set status = 'Active' where UserID = '$id'";
        $result = mysqli_query($con,$sql);
        
        if($result) return true;
        else return false;
        
    }

    function getAllResignApplicant(){

        $con = dbConnection();
        $sql = "select * from UserInfo where Status = 'Resigning'";

        $result = mysqli_query($con,$sql);

        return $result;

    }

    function searchCustomer($fullname){

        $con = dbConnection();
        $sql = "select * from UserInfo where Fullname like '%{$fullname}%' and Role = 'Customer';";

        $result = mysqli_query($con,$sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function searchDeliveryMan($fullname){

        $con = dbConnection();
        $sql = "select * from UserInfo where Fullname like '%{$fullname}%' and Role = 'Delivery Man';";

        $result = mysqli_query($con,$sql);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;

    }

?>