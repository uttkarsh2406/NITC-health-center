<?php
    include("connect.php");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $rollno=$_POST["rollno"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gphone = $_POST["gphone"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $rollno=strtoupper($rollno);
    
    $query1 = "SELECT * FROM student WHERE rollno ='{$rollno}'";
    $result = $conn->query($query1);

    $row = $result->fetch_assoc();
    if($address == ""){
        $address = $row["address"];
    }
    if($phone == ""){
        $phone = $row["phone"];
    }
    if($gphone == ""){
        $gphone = $row["g_phone"];
    }
    if($password == ""){
        $password = $row["password"];
    } 
    if($cpassword==""){
        $cpassword = $row["password"];
    }
    if(strcmp($password, $cpassword)){
        header('location: s_edit_error.html');
    }
    else{
        $sql = "UPDATE student SET address='{$address}', phone ='{$phone}', g_phone='{$gphone}', password = '{$password}' WHERE rollno= '{$rollno}';";

        if ($conn->query($sql) === TRUE) 
        {
            #header('location: s_login.html');
            #Method to go to previous page
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo 'ERROR';
        }
    }

?>
