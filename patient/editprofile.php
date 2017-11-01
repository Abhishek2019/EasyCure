<?php
session_start();
if(!isset($_SESSION['user'])){
   header("location:hospital_login.php");
}
$db = mysqli_connect("localhost","root","","easycure");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit']) && (!empty($_POST["huser"]) && !empty($_POST["duser"]))){
  $huser= $_POST['huser'];
  $duser= $_POST['duser'];
  $query= mysqli_query($db, "INSERT INTO doc_list VALUES('$huser','$duser')");
  if (mysqli_query($db, $query)) {
    echo "<script>".alert('New record created successfully')."</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
}
mysqli_close($db);
}else{
  echo "Enter Username";
}
?>
<!doctype html>
<html>
<head>

 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>P_profile</title>
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
  

    <link rel="stylesheet" href="../bootstrap/bootstrap.css">




    
    <link rel="stylesheet" href="p_profile.css">


</head>

<body>

       <div class="navbar navbar-default navbar-fixed-top navbar-inverse" >

          <div class="container">

              <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#btn1">

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
					<span class="icon-bar"></span>

                </button>

              	<a href="#" class="navbar-brand pull-left"><!--<img src="Untitled.png" width="50px" height="50px">--><img src="../css/images/flathos.png" width="60px" height="60px"></a>

              </div>
              <div class="collpase navbar-collapse" id="btn1">

              	<ul class="nav navbar-nav">


              	     <li class="">
						 <a href="../HomePage.html"><b>Home</b></a>

              	    </li>



              	    <li class="dropdown">
              	    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Hospitals</b><b class="caret"></b></a>

              	    <ul class="dropdown-menu">


              	       <li><a href="">List of Hospitals</a></li>
              	       <li><a href="">Book Appointment</a></li>

              	    </ul>
              	    </li>

              	    <li class="dropdown">
              	    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Blood Donation</b><b class="caret"></b></a>

              	    <ul class="dropdown-menu">

              	       <li><a href="">Donate</a></li>
             	       <li><a href="">Receive</a></li>

              	    </ul>
              	    </li>
              	    
              	   </ul>
              	   <ul class="nav navbar-nav navbar-right">  
              	    <li class="">
						 <a href="profile.php"><b>Your Profile</b></a>

              	    </li>
              	   </ul>
              	    </ul>
                    <ul class="nav navbar-nav navbar-right">  
                    <li class="">
                     <a href="logout.php"><b>Logout</b></a>

                    </li>
                   </ul>
             </div>

          </div>

       </div>
       
       <div id="main_title">  
       <br>

	   		<center><h1>Edit Profile</h1></center>
	   		
	   </div>	
	   
	   <div class="profile_pic">
	   
	      <center><img src="../css/images/profile_p.png" style="border: 1px solid black"></center>
	   	
	   </div>
     <center>
     <div class="editprofile">
      <form action="" method="post">
        <h2>Add Doctor</h2>
        <div><input type="text" placeholder="Hospital Username" name="huser"></div>
        <div><input type="text" placeholder="Doctor Username" name="duser"></div>
        <div><input type="submit" value="update" name="submit"></div>
      </form>
     </div></center>



<script src="../bootstrap/jquery.min.js"></script>
 <script src="../bootstrap/bootstrap.js"></script>
</body>
</html>