<?php
    include("connect.php");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $aptID=$_POST["aptID"]; 
    $createdby=$_POST["createdby"];
    $patient = $_POST["patient"];
    $doctor = $_POST["doctor"];
    $type = $_POST["type"];
    

    $sql = "INSERT INTO `appointment` (`aptID`, `createdby`, `patient`, `doctor`, `type`) 
    VALUES ('{$aptID}', '{$createdby}', '{$patient}', '{$doctor}', '{$type}') "; 

    

    if ($conn->query($sql) === TRUE) 
    {
        header('location: r_appt.php');
    } else {
        echo 'ERROR';
    }

    $conn->close();

    /*
    
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
            header('location: s_login.html');
        } else {
            echo 'ERROR';
        }
    }
    */

?>
