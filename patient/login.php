<?php
session_start();
 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>p_login</title>
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
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
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
	.image{
		padding: 12px 20px;
		margin-left: 150px;
	}
</style>
</head>

<body>
<div class="heading" style="font-family: Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', 'serif'">
<font size="+6">Patients Login</font>
</div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="image">
      <img src="../css/images/patient.png" width="250" height="250" alt="png"/>
    </div>
  <div class="subject">
  <font size="+2">
  <label><b>Username</b></label><br>
  <input type="text" placeholder="Enter Username" name="uname" required><br>
  <label><b>Password&nbsp</b></label><br>
  <input type="password" placeholder="Enter Password" name="psw" required><br>
    <button type="submit">Login</button><br>
    <a href="signup.php">not Sign Up yet?</a><br><br>
    </font>
  </div>
</form>
</body>
</html>

<?php
  if (!empty($_POST["uname"]) && !empty($_POST["psw"])) {
      $conn = mysqli_connect("localhost","root","","easycure");
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }else{
			       $usr = $_POST["uname"];
			       $pass = $_POST["psw"];
             $sql="SELECT `p_user` , `p_pass` FROM `easycure`.`patient` WHERE p_user = '$usr' LIMIT 0 , 1 ";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0) {
                $row=mysqli_fetch_array($result,MYSQLI_NUM);
                if($row[0] == $usr && $row[1] == $pass){
                  mysqli_close($conn);
                  $_SESSION["p_user"] = $usr;
                 echo "<script>window.open('hospital_list.php')</script>";
					//header("location: hospital_list.php");
					
                } else {
                  mysqli_close($conn);
                  echo "<script>alert('Invalid Password')</script>";
                }
			        } else {
				      mysqli_close($conn);
				      echo "<script>alert('Invalid User')</script>";
			  			}
				}
  }
?>
