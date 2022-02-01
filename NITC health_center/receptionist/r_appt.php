
<?php

$user = 'root';
$password = '';

$database = 'healthcare';

$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}

// SQL query to select data from database
$sql = "SELECT * FROM appointment";
$result = $mysqli->query($sql);
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Appointment List</title>
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

<body style="padding-top:11%;text-align:center;background-image: url('G25_presentation.png'); background-size: cover; background-repeat: no-repeat;">
	<section>
		<h1>List of Appointments</h1>
		<!-- TABLE CONSTRUCTION-->
		<table>
			<tr>
				<th>Appointment ID</th>
				<th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Time</th>
                <th>Appointment Type</th>
				<th>Created By</th>
			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS-->
			<?php // LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['aptID'];?></td>
				<td><?php echo $rows['doctor'];?></td>
				<td><?php echo $rows['patient'];?></td>
				<td><?php echo $rows['timestamp'];?></td>
                <td><?php echo $rows['type'];?></td>
                <td><?php echo $rows['createdby'];?></td>
			</tr>
			<?php
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
