<html>
<head>
    <link href="/nitchc/css/style.css" rel="stylesheet" />
    <style>
        .cls{
            font-family: 'Consolas', Times, serif;
            font-style: bold;
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
            border: 1px solid black;
            border-radius: 20px;    
            border-collapse: separate;
            border-spacing: 5px 5px;
            /* margin-top: 60px;
            border: #004166 solid black; */
            background-color: #ffffff;
        }
		td {
			background-color: #ffffff;
			/* border: 1px solid black; */
            border-radius: 10px;
		}
        th{
            /* background-color: #ADD8E6; */
            color: black;
        }

		th,
		td {
			font-weight: bold;
			/* border: 1px solid black; */
			padding: 10px;
			text-align: center;
            /* border: 1px solid #000000; */
            border-radius: 10px;
		}

		td {
			font-weight: lighter;
		}
    </style>
</head>
<body style="padding-left:0px;text-align:center; background-image: url('G25_presentation.png'); background-size: 100% 100%; ">
<br>
<h1>Your profile</h1>

<?php
//Initializing the session

include("connect.php");



if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$divider='<hr><br>';
$roll=$_POST["rollno"];
$password=$_POST["password"];
if($roll==""){
	header('location: error.html');
} 
else{
    $roll=strtoupper($roll);
    $query1 = "SELECT * FROM student WHERE rollno ='{$roll}' AND password='{$password}' "; # WHERE rollno = '$roll' -> optional condition
    $result = $conn->query($query1);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
        $_SESSION['rollno'] = $row["rollno"];
        $_SESSION['dob'] = $row["dob"];
        $_SESSION['name'] = $row["name"];
        $_SESSION['address'] = $row["address"];
        $_SESSION['phone'] = $row["phone"];
        $_SESSION['g_phone'] = $row["g_phone"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['password'] = $row["password"];


            echo 	'<h2><span ><b>Name :</b>' . $row["name"] . '</h2>';
            echo 	'<h2><span><b>Roll Number :</b>' . $row["rollno"] . '</h2>';
            echo 	'<h2><span><b>Date of birth :</b>' . $row["dob"] . '</h2>';
            echo 	'<h2><span><b>Address :</b>' . $row["address"] . '</h2>';

            echo    '<h2><span><b>Phone :</b>' . $row["phone"] . '</h2>'.
                    '<h2><span><b>Guardian Phone :</b>' . $row["g_phone"] . '</h2>'.
                    '<h2><span><b>Email :</b>' . $row["email"] . '</h2>';   
        }
    }
    else{
        header('location: error.html');
    }
?>
  
<a href ="s_edit.html"><button class="button">Edit info</button></a>
<a href="../homepage.php"><button type="button" class="cancelbtn" style="background-color:#cce0ff;color:black;">Log Out</button></a> <br>
   
<?php
$sql = "SELECT * FROM prescription where PT='{$roll}' ";
$result = $conn->query($sql);


}
?>

<section>
		<h1>Your Medical history</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>Date</th>
				<th>Prescription ID</th>
                <th>Diagnosis</th>
                <th>Pharmacist</th>
                <th>Patient</th>
				<th>Doctor</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['date'];?></td>
				<td><?php echo $rows['pID'];?></td>
				<td><?php echo $rows['diagnosis'];?></td>
				<td><?php echo $rows['pharmacist'];?></td>
                <td><?php echo $rows['PT'];?></td>
                <td><?php echo $rows['DR'];?></td>
			</tr>
			<?php
				}
				$conn->close();
			?>
		</table>
	</section>
<br><br>
</body>
</html>


