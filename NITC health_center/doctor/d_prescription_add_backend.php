<?php
    include("connect.php");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $pID=$_POST["pID"]; 
    $date=$_POST["date"];
    $diagnosis = $_POST["diagnosis"];
    $pharmacist = $_POST["pharmacist"];
    $patient = $_POST["patient"];
    $doctor = $_POST["doctor"];
    $aptID = $_POST["aptID"];
    

    $sql = "INSERT INTO `prescription` (`date`, `pID`, `diagnosis`, `pharmacist`, `PT`, `DR`, `appointID`) VALUES ('$date', '$pID', '$diagnosis' ,'$pharmacist','$patient', '$doctor', '{$aptID}' )"; 

    if ($conn->query($sql) === TRUE) 
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
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
