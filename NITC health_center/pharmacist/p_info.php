<html>
<head>
    <link href="/nitchc/css/style.css" rel="stylesheet" />
    <style>
        .cls{
            font-family: 'Times New Roman', Times, serif;
            font-style: normal;
        }
        button {
            background-color: #045aaa;
            color: white;
            padding: 13px 18px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 175px;
            border-radius: 20px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }
        h1 {
			text-align: center;
			color: #004166;
			font-size: normal;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
            text-decoration: underline;
            text-decoration-color: #004166;
		}
        h2 {
			text-align: center;
			color: #004166;
			font-size: normal;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
    </style>
</head>
<body style="padding-top:13%;text-align:center; background-image: url('../assets/img/info_bg.jpeg'); background-size: 100% 100%; ">
<h1>Your Profile</h1>

<?php

include("connect.php");

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$divider='<hr><br>';
$username=$_POST["username"];
$password=$_POST["password"];

if($username==""){
	header('location: error.html');
} 
else{
    $username=strtoupper($username);
    $query1 = "SELECT * FROM pharmacist WHERE pharmID ='{$username}' AND password ='{$password}' "; 
    $result = $conn->query($query1);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo 	'<h2><span ><b>Name :</b>' . $row["name"] . '</h2>';
            echo 	'<h2><span><b>Pharmacist ID :</b>' . $row["pharmID"] . '</h2>';
            echo 	'<h2><span><b>Phone number :</b>' . $row["phone"] . '</h2>';
        }
    }
    else{
        header('location: error.html');
    }
?>
  
<a href ="p_edit.html"><button class="button">Edit info</button></a>
<a href ="p_medicine_insert.html"><button class="button">Add new medicine</button></a><br>
<a href ="p_medicine.php"><button class="button">Dispatch medicine</button></a>
<a href="../homepage.php"><button type="button" class="cancelbtn" style="background-color:#cce0ff;color:black;">Log Out</button></a> <br>
   
<?php


}

$conn->close();

?>

</body>
</html>


