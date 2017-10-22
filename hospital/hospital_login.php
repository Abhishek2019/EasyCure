<?php
session_start();
$db = mysqli_connect("localhost","root","","easycure5");
if(isset($_POST['submit'])){
	$error="";
	$user= $_POST['username'];
	$password= $_POST['password'];
	$query= mysqli_query($db, "SELECT * FROM hospital WHERE h_user= '$user' && h_pass= '$password'");
	if(mysqli_num_rows($query) == 0 ){
		$error="<script>alert('Invalid Username or password')</script>";
	}else{
		$_SESSION['user'] = $user ;
		header("location:doclist.php");
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>hospital_login</title> 
<link rel="stylesheet" href="login_style.css">
</head>
<body>
	<div class="container">
	 <img src="../images/flathos.png">	
	 <p>Hospital Login</p>	
	 <?php if(isset($error)): ?>
	 	<?php echo $error ?>
	 <?php endif; ?>
	 <form  method="post" action="">
		<div class="forminput">
			<input type="text" name="username" placeholder="Enter Username">
		</div>
		<div class="forminput">
			<input type="password" name="password" placeholder="Enter Password">
		</div>
		<input type="checkbox" class="remember"><label>Remember me</label>
		<a href="#">Forgot password?</a><br><br>
		<input type="submit" name="submit" value="LOGIN" class="btn-login"> 
	 </form>
    </div>
</body>
</html>

