<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
<style>
	form {
    border: 3px solid #0066FF;
    margin: 0 150px 0 150px ;

}
	.heading{
		margin-left: 300px;
		margin-top: 50px;
		margin-bottom: 50px;
		color: #0066FF;
	}
	.subject{
		margin-left: 150px;
		font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif";
		color: #0066FF;
	}
	input[type=number],input[type=email],input[type=text], input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;

    border: 1px solid #ccc;
		box-sizing: border-box;
	}
	.image{
		padding: 12px 20px;
		margin-left: 150px;
	}
		button{
    background-color: #00DBFF;
    color: black;
    padding: 14px 20px;
    margin-bottom: 5px;
	margin-top: 5px;
    cursor: pointer;
    width:15%;
	border: none;
}
</style>

</head>
<body>
<div class="heading" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
<font size="+6">Sign Up</font>
</div>
		<form method="post" onsubmit="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="image">
		  <img  src="../images/doc1.png" width="150" height="150" alt="png"/> </div>
		<div class="subject" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
				<font size="+2">
					<label><b>Full Name</b></label><br>
				  <input type="text" placeholder="Enter Name" name="flname" required><br>

				  <label><b>Username</b></label><br>
				  <input type="text" placeholder="Example123" name="uname" required><br>

					<label><b>Phone No</b></label><br>
				  <input type="number" placeholder="9876543210" name="phone"><br>

					<label><b>Email-id</b></label><br>
					<input type="email" placeholder="Enter email-id" name="email" required><br>

					<label><b>Your Degree</b></label><br>
					<input type="text" placeholder="Enter Degree" name="degree" required><br>

					<label><b>Specialist</b></label><br>
					<input type="text" placeholder="Enter Speciality" name="specialist" required><br>

				  <label><b>Password</b></label><br>
				  <input type="password" placeholder="Atleast 8 characters" name="psw" required><br>

					<label><b>Gender</b></label>&nbsp&nbsp&nbsp
				  <input type="radio" name="gender" value="Male" checked> Male
				  <input type="radio" name="gender" value="Female"> Female
				  <input type="radio" name="gender" value="Other"> Other<br><br>
				  <center> <button type="submit">Sign Up</button><br><br> </center>
				  <a href="login.php">Alredy SignUp?</a><br>
				</font>
		</div>
		</form>
</body>
</html>

<!--

	<script type="text/javascript">
	onkeypress="nameCheck(this.value)"
	function nameCheck(value){
		alert(value);
	}
	</script>
-->

<?php
	error_reporting(E_ERROR | E_PARSE);
	if(!empty($_POST['uname']) ){
		$hostname = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "easycure";
		$conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
		if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
		}

		$name = $_POST['flname'];
		$username = $_POST['uname'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$degree = $_POST['degree'];
		$Specialist = $_POST['specialist'];
		$password = $_POST['psw'];
		$gender = $_POST['gender'];

		//echo "<script>alert('$gender')</script>";
		$sql = "INSERT INTO `doctor` (`d_user`, `d_name`, `d_pass`, `d_phone`, `d_email`, `d_degree`, `d_gender`, `d_specalist`) VALUES ('$username', '$name', '$password', '$phone', '$email', '$degree', '$gender', '$Specialist')";

			if (mysqli_query($conn, $sql)) {
			echo "<script>alert('New record created successfully')</script>";
			} else {
			echo "<script>alert('Registration Failed Try Again.')</script>";		//'Error: ' . $sql . '<br>' . mysqli_error($conn)
			}
			mysqli_close($conn);
	}
 ?>
