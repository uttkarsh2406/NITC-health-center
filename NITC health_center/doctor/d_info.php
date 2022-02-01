<html>
<head>
    <link href="/nitchc/css/style.css" rel="stylesheet" />
    <style>
        .cls{
            /* font-family: 'Times New Roman', Times, serif;
            font-style: italic; */
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
        
        table {
            margin: 0 auto;
            font-size: large;
            /* border: 1px solid black; */
            border-radius: 10px;
            border-collapse: separate;
            border-spacing: 15px 10px;
        }
		td {
			background-color: #ffffff;
			/* border: 1px solid black; */
            border-radius: 10px;
		}
        th{
            background-color: #045aaa;
            color: white;
        }

		th,
		td {
			font-weight: bold;
			/* border: 1px solid black; */
			padding: 10px;
			text-align: center;
            border: 1px solid #000000;
            border-radius: 10px;
		}

		td {
			font-weight: lighter;
		}

        input[type=text],
        input[type=password] {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 20px;
        }
    </style>
</head>
<body style="padding-top:9%;text-align:center; background-image: url('../assets/img/info_bg.jpeg'); background-size: 100% 100%;">
<!-- <br><br><br><br><br> -->
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
    $query1 = "SELECT * FROM doctor WHERE docID ='{$username}' AND password ='{$password}' "; 
    $result = $conn->query($query1);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo 	'<h2><span><b>Name :</b>' . $row["name"] . '</h2>';
            echo 	'<h2><span><b>Doctor ID :</b>' . $row["docID"] . '</h2>';
            echo 	'<h2><span><b>Phone number :</b>' . $row["phone"] . '</h2>';
            echo 	'<h2><span><b>Address :</b>' . $row["address"] . '</h2>';
            echo 	'<h2><span><b>Qualification :</b>' . $row["qualification"] . '</h2>';
        }
    }
    else{
        header('location: error.html');
    }
}
?>
  
<a href ="d_edit.html"><button class="button">Edit info</button></a>
<a href ="d_appt.php"><button class="button">Appointments</button></a><br>
<a href ="d_prescription_add.html"><button class="button">Add new prescription</button></a>
<a href="../homepage.php"><button type="button" class="cancelbtn" style="background-color:#cce0ff;color:black;">Log Out</button></a> <br><br>
<form action="d_search_student.php" method="post" >
        <input type="text" placeholder="Enter student roll number" name="rollno" id="rollno" required>

        <button type="submit" style="background-color:#cce0ff;color:black;">Search</button>
</form>


<?php

  /*$query1 = "SELECT * FROM prescription WHERE 1 "; # WHERE rollno = '$roll' -> optional condition
    $result = $conn->query($query1);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo 	'<h1 class = "cls" \><span><b>Prescription ID :</b>' . $row["pID"] . '</h1>';
            echo 	'<h1 class = "cls" \><span><b>Patient name :</b>' . $row["PT"] . '</h1>';
            echo 	'<h1 class = "cls" \><span><b>Diagnosis :</b>' . $row["diagnosis"] . '</h1>';
            echo 	'<h1 class = "cls" \><span><b>Date :</b>' . $row["date"] . '</h1>';
        }
    }

}*/

$conn->close();

?>

</body>
</html>


