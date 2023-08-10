<!DOCTYPE html>
<html>
<head>
	<title>MySQL Table Viewer</title>
</head>
<body>
	<h1>MySQL Table Viewer</h1>
	<?php
		// Define database connection variables
		$servername = "DBServer";
		$username = "DB_USER";
		$password = "DB_PASS";
		$dbname = "DB_NAME";

		//Establishes the connection
		$conn = mysqli_init();
		mysqli_real_connect($conn, $servername, $username, $password, $dbname, 3306);

		if (mysqli_connect_errno($conn)) { 
			die('Failed to connect to MySQL: '.mysqli_connect_error());
		}

		//Run the Select query
		$res = mysqli_query($conn, 'SELECT * FROM employees limit 100');

		if ($res->num_rows > 0) {
			// Display table headers
			echo "<table><tr><th>Emp_No</th><th>Name</th><th>Email</th></tr>";

			while ($row = mysqli_fetch_assoc($res)) {
				echo "<tr><td>" . $row["emp_no"] . "</td><td>" . $row["first_name"] . " " . $row["last_name"] . "</td><td>" . $row["email_id"] . "</td></tr>"; 
				//var_dump($row);
			}

			echo "</table>";

		} else {
			echo "<p> 0 results </p>"; 
		}

		//Close the connection
		mysqli_close($conn);
	?>
</body>
</html>
