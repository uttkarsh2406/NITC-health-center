<?php
    include("connect.php");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $repID=$_POST["username"];
    $phone = $_POST["phone"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $pharmID=strtoupper($repID);
    
    $query1 = "SELECT * FROM receptionist WHERE repID ='{$repID}'";
    $result = $conn->query($query1);

    $row = $result->fetch_assoc();

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
        header('location: r_edit_error.html');
    }
    else{
        $sql = "UPDATE receptionist SET phone ='{$phone}', password = '{$password}' WHERE repID= '{$repID}';";

        if ($conn->query($sql) === TRUE) 
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo 'ERROR';
        }
    }

?>
