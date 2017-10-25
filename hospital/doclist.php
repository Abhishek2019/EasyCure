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
    <title>doclist</title>
   
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

	   		<center><h1>Doctor list</h1></center>
	   		
	   </div>	
	   
	   <div class="profile_pic">
	   
	      <center><img src="../css/images/profile_p.png" style="border: 1px solid black"></center>
	   	
	   </div>
     <div class="list">
      <center>
       <table border="1" cellpadding="1" cellspacing="1">
        <tr>
          <th>Name</th>
          <th>Specialist</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Degree</th>
        </tr>
        <?php
        $db = mysqli_connect("localhost","root","","easycure5");
        $user = $_SESSION['user'];
        $query = "SELECT * FROM `doc_list` where h_user='$user'";
        $result = mysqli_query($db,$query);
        $duser = array();
        while($row = mysqli_fetch_assoc($result)){
          $duser[] = $row['d_user'];
        }
        $sql="SELECT * FROM `doctor` WHERE d_user in (SELECT d_user FROM `doc_list` WHERE h_user='$user')";
        $result1 = mysqli_query($db,$sql);
        if (mysqli_num_rows($result1) > 0) {
            // output data of each row    $row[""]
        while($row = mysqli_fetch_assoc($result1)) {
              //echo $row["h_name"];
         echo "<tr> <td>".$row["d_name"]."</td>"."<td>".$row['d_specalist']."</td>"."<td>".$row['d_phone']."</td>"."<td>".$row['d_email']."</td>"."<td>".$row['d_degree']."</td><tr>";
            }
          }
        ?>
       </table></center>
     </div>
	   
	   
	   


<script src="../bootstrap/jquery.min.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</body>
</html