<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Medical history</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
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
			font-size: xx-large;
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
            border-spacing: 10px 5px;
			background-color: #ffffff;
        }
		td {
			background-color: #ffffff;
			/* border: 1px solid black; */
            border-radius: 10px;
		}
        th{
            /* background-color: #045aaa; */
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

<?php

include("connect.php");

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$divider='<hr><br>';
$rollno=$_POST["rollno"];

if($rollno==""){
	header('location: error.html');
} 
else{
    $rollno=strtoupper($rollno);
    $query1 = "SELECT * FROM prescription WHERE PT ='{$rollno}' "; 
    $result = $conn->query($query1);

?>
<br><br><br><br><br><br><br><br><br>
<body  style="padding-left:0px;text-align:center; background-image: url('G25_presentation.png'); background-size: 100% 100%; ">
	<section>
		<h1>Medical history of <?php echo $rollno ; ?></h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>Date</th>
				<th>Prescription ID</th>
                <th>Diagnosis</th>
                <th>Pharmacist</th>
                <th>Patient</th>
				<th>Doctor</th>
				<th>Appointment</th>
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
				<td><?php echo $rows['appointID'];?></td>
			</tr>
			<?php
				}
            }
			?>
		</table>
	</section>
	<br><br>
	<button type="button" class="cancelbtn" onclick="goBack()">Go back</button><br>
      <script>
        function goBack() {
          window.history.back();
        }
        </script>
</body>
</html>