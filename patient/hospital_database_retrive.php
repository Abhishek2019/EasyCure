<?php
$hostname = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "easy_cure";

// Create connection
$conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


		echo '<table border="1" align="center">';
		echo '<tr> <th>Name</th> <th>City</th> <th>Address</th> <th>Phone</th> <th>Email</th> </tr>';
			 
					$sql = "SELECT `h_name`, `h_city`, `h_address`, `h_phone`, `h_email` FROM `hospital`";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						// output data of each row		$row[""]
						while($row = mysqli_fetch_assoc($result)) {
							//echo $row["h_name"];
							echo "<tr> <td>".$row["h_name"]."</td> <td>".$row["h_city"]."</td> <td>".$row["h_address"]."</td> <td>".$row["h_phone"]."</td> <td>".$row["h_email"]."</td><tr>";
						}
					}
				
		echo "</table>";
	mysqli_close($conn);
?> 


