
<?php

include("connect.php");

// SQL query to select data from database

$sql = "SELECT * FROM prescription where PT='{$roll}' ";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Prescription List</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>

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
            /* border: 1px solid black; */
            border-radius: 10px;
            border-collapse: separate;
            border-spacing: 5px 5px;
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
	</style>
</head>

<body>
	<section>
		<h1>Medical history of <?php echo $roll ; ?></h1>
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
</body>
</html>