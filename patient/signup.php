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
	input[type=text], input[type=password] {
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
<form>
<div class="image">
  <img src="../css/images/patient.png" width="150" height="150" alt="png"/> </div>
<div class="subject" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
<font size="+2">
	<label><b>First Name</b></label><br>
     <input type="text" placeholder="Enter Firstname" name="fname" required><br>
    <label><b>Last Name</b></label><br>
     <input type="text" placeholder="Enter Lastname" name="lname" required><br>
    <label><b>Email-id</b></label><br>
     <input type="text" placeholder="Enter email-id" name="email" required><br>
     <label><b>Username</b></label><br>
      <input type="text" placeholder="Example123" name="uname" required><br>
      <label><b>Password</b></label><br>
     <input type="password" placeholder="Atleast 8 characters" name="psw" required><br>
     <label><b>Phone No</b></label><br>
     <input type="text" placeholder="1234567890" name="phone"><br>
      <label><b>Gender</b></label>
      <input type="radio" name="gender" value="male" checked> Male
      <input type="radio" name="gender" value="female"> Female
      <input type="radio" name="gender" value="other"> Other<br>
      <button type="submit">Sign Up</button><br><br>
      <a href="login.php">Alredy logged in?</a><br><br>


</font>
</div>
</form>
</body>
</html>
