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

$name = $_POST['hname'];
$city = $_POST['hcity'];
$address = $_POST['haddress'];
$phone = $_POST['hphone'];
$email = $_POST['hmail'];

//echo "$name<br>$city<br>$address<br>$phone<br>$email<hr>";
$sql = "INSERT INTO `hospital` (`h_id`, `h_name`, `h_city`, `h_address`, `h_phone`, `h_email`) VALUES (NULL, '$name', '$city', '$address', '$phone', '$email')";
if (mysqli_query($conn, $sql)) {
    echo "<script>".alert('New record created successfully')."</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="head">
<h1>SignUp</h1>
</div>
<div class="container">
	<form action="">
	    <img src="../images/flathos.png" alt="Hospital" id="logo"><br><br>
		<label>Hospital Name</label><br>
		<input type="text" name="hname" id="hname"><br><br>
		<label>Hospital Username</label><br>
		<input type="text" name="huser" id="huser"><br><br>
		<label>Password</label><br>
		<input type="Password" name="hpass" id="hpass"><br><br>
		<label>Hospital Contact No</label><br>
		<input type="text" name="hphone" id="h"><br><br>
		<label>Hospital Address</label><br>
		<input type="text" name="haddress" id="haddress"><br><br>
		<label>Hospital Email</label><br>
		<input type="text" name="hmail" id="hmail"><br><br>
		<button type="submit" name="submit" id="submit">Sign Up</button>
	</form>
</div>

</body>
</html>