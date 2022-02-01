<?php
include("connect.php");
$sql = "SELECT * FROM medicine";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Medicine List</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<link href="/nitchc/css/style.css" rel="stylesheet" />
	<style>
		input[type=text],
			input[type=password] {
			width: 150px;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			border-radius: 20px;
			}
		table {
			margin: 0 auto;
			font-size: large;
			border-radius: 20px;
		}
		.table {
			margin: 0 auto;
			font-size: large;
			border:1.5px solid black;
			border-radius: 20px;
		}
		h1 {
			text-align: center;
			color: #004166;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}
		td {
			background-color: #ffffff;
			border-radius: 20px;
		}
		th,
		td {
			font-weight: bold;
			padding: 10px;
			text-align: center;
			border-radius: 20px;
		}
		td {
			font-weight: lighter;
			border-radius: 20px;
		}
		.button {
            background-color: #045aaa;
            color: white;
            padding: 13px 18px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 150px;
            border-radius: 20px;
        }
		button {
            background-color: #cce0ff;
            color: black;
            padding: 13px 18px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 150px;
            border-radius: 20px;
        }
	</style>
</head>
<body>
	<section>
		<h1>List of Medicines</h1>
		<table class="table">
			<tr>
				<th>Drug ID</th>
				<th>Drug Name</th>
				<th>Quantity</th>
				<th>Expiry Date</th>
			</tr>
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<td><?php echo $rows['drugID'];?></td>
				<td><?php echo $rows['drugname'];?></td>
				<td><?php echo $rows['quantity'];?></td>
				<td><?php echo $rows['expiry'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</section>
	<br><br>
	<form method = "post" action = "<?php $_PHP_SELF ?>">
		<table width = "400" border =" 0" cellspacing = "1" 
			cellpadding = "2">
		
			<tr>
			<td width = "100">Drug ID</td>
			<td><input name = "drugID" type = "text" 
				id = "drugID" required></td>
			</tr>
		
			<tr>
			<td width = "100">Quantity dispatched</td>
			<td><input name = "quantity" type = "text" 
				id = "quantity"></td>
			</tr>
		
			<tr>
			<td width = "100"> 
			<button type="button" onclick="goBack()">Go back</button>
				<script>
					function goBack() {
					window.history.back();
				}
				</script>

			</td>
			<td>
				<input name = "update" type = "submit" 
					id = "update" value = "Update" class="button">
			</td>
			</tr>
		
		</table>
	</form>
	<?php
         if(isset($_POST['update'])) {
            // $dbhost = 'localhost';
            // $dbuser = 'root';
            // $dbpass = '';
			// $conn = new mysqli($dbhost, $dbuser,$dbpass, 'healthcare');
			// if ($conn->connect_error) {
			// 	die('Connect Error (' .
			// 	$conn->connect_errno . ') '.
			// 	$conn->connect_error);
			// }
            $drugID = $_POST['drugID'];
            $quantity = $_POST['quantity'];
            $query1 = "SELECT * FROM medicine WHERE drugID = '$drugID' "; 
			$result1 = $conn->query($query1);
			$row1 = $result1->fetch_assoc();
			$final=$row1["quantity"];
			if($quantity!="")
				$final=$row1["quantity"]-$quantity;
			$sql = "UPDATE medicine SET quantity =$final  WHERE drugID = '$drugID' " ;
			$result = $conn->query($sql);
			if($conn->query($sql) == true){
				echo "Successfully updated";
				$quantity=0;
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				#header("Refresh: 1");
			}
			else{
				echo "ERROR: $sql <br> $conn->error";
			}
			$conn->close();
         }
      ?>
	  <br>
</body>

</html>
