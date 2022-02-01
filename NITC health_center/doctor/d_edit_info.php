<?php
    include("connect.php");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $docID=$_POST["username"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $docID=strtoupper($docID);
    
    $query1 = "SELECT * FROM doctor WHERE docID ='{$docID}'";
    $result = $conn->query($query1);

    $row = $result->fetch_assoc();
    if($address == ""){
        $address = $row["address"];
    }
    if($phone == ""){
        $phone = $row["phone"];
    }
    if($password == ""){
        $password = $row["password"];
    } 
    if($cpassword==""){
        $cpassword = $row["password"];
    }
    if(strcmp($password, $cpassword)){
        header('location: d_edit_error.html');
    }
    else{
        $sql = "UPDATE doctor SET address='{$address}', phone ='{$phone}', password = '{$password}' WHERE docID= '{$docID}';";

        if ($conn->query($sql) === TRUE) 
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo 'ERROR';
        }
    }

?>
