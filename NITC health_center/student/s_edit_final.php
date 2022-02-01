<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Info</title>
    <link rel="stylesheet" href="../css/s_edit.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            padding: 20px;
            background-image: url('G25_presentation.png');
            background-repeat: no-repeat;
            background-position: auto;
            background-size: cover;
            backdrop-filter: blur(0px);
        }
        .shaky {
        animation: shake 0.25s;
        animation-iteration-count: 1;
        box-shadow: 0 0 1em rgb(255, 255, 255);
        transition: box-shadow 0.5s;

        }

        @keyframes shake {
        50% {box-shadow: 0px 0px 20px rgb(255, 0, 0);}
        0% { transform: translate(1px, 1px) rotate(0deg); }
        10% { transform: translate(-1px, -2px) rotate(-0.5deg); }
        20% { transform: translate(-3px, 0px) rotate(1deg); }
        30% { transform: translate(3px, 2px) rotate(0deg); }
        40% { transform: translate(1px, -1px) rotate(0.5deg); }
        50% { transform: translate(-1px, 2px) rotate(-0.5deg); }
        60% { transform: translate(-3px, 1px) rotate(0deg); }
        70% { transform: translate(3px, 1px) rotate(-0.5deg); }
        80% { transform: translate(-1px, -1px) rotate(0.5deg); }
        90% { transform: translate(1px, 2px) rotate(0deg); }
        100% { transform: translate(1px, -2px) rotate(-0.5deg); }
    }
    </style>
</head>

<body>
    




<center>
<?php
         if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            
            // $conn = mysql_connect($dbhost, $dbuser, $dbpass);

			$mysqli = new mysqli($dbhost, $dbuser,
				$dbpass, 'healthcare');

			// Checking for connections
			if ($mysqli->connect_error) {
				die('Connect Error (' .
				$mysqli->connect_errno . ') '.
				$mysqli->connect_error);
			}
			
            //$name = $_POST['name'];
            $rollno = $_POST['rollno'];
            //$dob  = $_POST['dob'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $g_phone = $_POST['g_phone'];
            
            $sql = "UPDATE student SET address = '$address', email = '$email', phone = '$phone', g_phone = '$g_phone' WHERE rollno = '$rollno'" ;
            
			$result = $mysqli->query($sql);

			if($mysqli->query($sql) == true){
				echo "Successfully updated";
			}
			else{
				echo "ERROR: $sql <br> $mysqli->error";
				}
            
			$mysqli->close();
         }
		 {
            ?>
            <form action = "<?php $_PHP_SELF ?>" class="form" method="post">
        <h2>&nbspPROFILE</h2>
		<table>
		<tr>
		<!--
        <td>Name:</td><input name = "name" type = "text" id = "name">
        </td>
		</tr>
		-->
		<tr>
        <td>Roll No:</td><td><input name = "rollno" type = "text" id = "rollno">
        </td>
		</tr>
		<!--
		<tr>
        <td>Date of Birth:</td><td><input placeholder="<?php echo $dob ?>" readonly></input>
        </td>
		</tr>
		-->
		<tr>
        <td>Address:</td><td><input name = "address" type = "text" id = "address">
        </td>
		</tr>
		<tr>
        <td>Email:</td><td><input name = "email" type = "text" id = "email">
        </td>
		</tr>
		<tr>
        <td>Phone:</td><td><input name = "phone" type = "text" id = "phone">
        </td>
		</tr>
		<tr>
        <td>Guardian's Phone:</td><td><input name = "g_phone" type = "text" id = "g_phone">
        </td>
		</tr>
		<tr>
        <td>New Password:</td><td><input name = "password" type = "text" id = "password">
        </td>
		</tr>
		</table>
        <!--
        <p type="Address:"><input placeholder="<?php echo $address ?>"></input>
        </p>
        <p type="Email:"><input placeholder="<?php echo $email ?>"></input>
        </p>
        <p type="Phone:"><input placeholder="<?php echo $phone ?>"></input>
        </p>
        <p type="Guardian's Phone:"><input placeholder="<?php echo $g_phone ?>"></input>
        </p>
        <p type="New Password:"><input placeholder="<?php echo $password ?>" id = "password"></input>
        </p>
-->
        <button><input name = "update" type = "submit" 
                              id = "update" value = "Update"></button>
    </form>
               
            <?php
         }
      ?>
</center>

</body>

</html>