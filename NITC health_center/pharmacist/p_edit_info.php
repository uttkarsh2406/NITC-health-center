<?php
    include("connect.php");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $pharmID=$_POST["username"];
    $phone = $_POST["phone"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];

    $pharmID=strtoupper($pharmID);
    
    $query1 = "SELECT * FROM pharmacist WHERE pharmID ='{$pharmID}'";
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
        header('location: p_edit_error.html');
    }
    else{
        $sql = "UPDATE pharmacist SET phone ='{$phone}', password = '{$password}' WHERE pharmID= '{$pharmID}';";

        if ($conn->query($sql) === TRUE) 
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo 'ERROR';
        }
    }

?>
