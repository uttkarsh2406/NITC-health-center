<?php

$user = 'root';
$password = '';

$database = 'healthcare';

$servername='localhost';
$mysqli = new mysqli($servername, $user,
				$password, $database);

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}


$id = $_GET['drugID']; // get id through query string

$qry = mysqli_query($db,"select * from medicine where drugID='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $quantity = $_POST['quantity'];
	
    $edit = mysqli_query($db,"update medicine set quantity='$quantity' where drugID='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Medicine Data</h3>

<form method="POST">
 <input type="text" name="drugID" value="<?php echo $data['drugID'] ?>" placeholder="<?php echo $id ?>" readonly></input>
  <input type="text" name="quantity" value="<?php echo $data['quantity'] ?>" placeholder="Enter quantity" Required>
  <input type="submit" name="update" value="Update">
</form>