<?php
$hostname = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "easy_cure";
/*
CREATE TABLE `easy_cure`.`Hospital` ( `h_id` INT(5) NOT NULL AUTO_INCREMENT , `h_name` VARCHAR(100) NOT NULL , `h_city` VARCHAR(15) NOT NULL , `h_address` VARCHAR(255) NOT NULL , `h_phone` INT(11) NOT NULL , `h_email` VARCHAR(30) NOT NULL , PRIMARY KEY (`h_id`), UNIQUE (`h_phone`), UNIQUE (`h_email`)) ENGINE = InnoDB;
*/
// Create connection
$conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	echo "connected Sucessfully";
}
$sql = "SELECT * FROM `doctor`";
$records =$sql;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
						// output data of each row		$row[""]
	while($row = mysqli_fetch_assoc($result)) {
							//echo $row["h_name"];
         echo "<tr> <td>".$row["d_name"]."</td><tr>";
						}
					}
				
		echo "</table>";
	mysqli_close($conn);
?> 
