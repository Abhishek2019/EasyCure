<?php
session_start();
if(!isset($_SESSION['user'])){
   header("location:hospital_login.php");
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

	   		<center><h1>Your Profile</h1></center>
	   		
	   </div>	
	   
	   <div class="profile_pic">
	   
	      <center><img src="../images/flathos.png" style=" width: 150px;height: 150px"></center>
	   	
	   </div>
	   <center>
	   <div class="profilebody">
	   	   <?php
	   	     $db = mysqli_connect("localhost","root","","easycure5");
             $user = $_SESSION['user'];
             $query = "SELECT * FROM `hospital` WHERE h_user ='$user'";
             $result = mysqli_query($db,$query);
             if (mysqli_num_rows($result) > 0) {
             // output data of each row    $row[""]
              while($row = mysqli_fetch_assoc($result)) {
              //echo $row["h_name"];
               echo "<h4>".$row['h_name']."</h4>";
               echo "<h4>".$row['h_contact']."</h4>";
               echo "<h4>".$row['h_email']."</h4>";
               echo "<h4>".$row['h_add']."</h4>";
               echo "<h4>".$row['h_city']."</h4>";
            }
          }
	   	 ?>
	   	 <a href="editprofile.php">Edit</a>
	   	</div></center>
	   


<script src="../bootstrap/jquery.min.js"></script>
 <script src="../bootstrap/bootstrap.js"></script>
</body>
</html>