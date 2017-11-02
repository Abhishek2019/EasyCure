<?php
session_start();
//echo "Welcome ".$_SESSION["p_user"];
//session_unset();
//session_destroy();
?>

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

<body class="container-fluid">

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
						 <a href="p_profile.php"><b>Your Profile</b></a>

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
	   
	      <center><img src="../css/images/profile_p.png" style="border: 1px solid black"></center>
	   	
	   </div>
	   
 <?php
	
		$conn = mysql_connect("localhost","root","");	
		if($conn)
		{
			//echo "connected";
			echo "<BR>";
			
			 if( mysql_select_db('easycure'))
             {
			 	//echo "Database found <BR>";
				    $username=$_SESSION["p_user"];
				
				 echo "<BR>";
				   
					 $sql="SELECT * FROM patient where p_user='$username'";
   	  				//$sql="DELETE FROM  patient WHERE name='$name'";
   	  				$records=mysql_query($sql);
				 
				 
				   function mysql_resultTo2DAssocArray( $result) {
    					$i=0;
    					$ret = array();
    					while ($row = mysql_fetch_assoc($result))
						{
        						foreach ($row as $key => $value) {
            					$ret[$i][$key] = $value;
									
            			}
        				$i++;
        				}
    					return ($ret);
    					}			
				 

				 

				$r=mysql_resultTo2DAssocArray($records);
			
				//print_r(mysql_resultTo2DAssocArray($records));
				 
   			 }
			 else
			 {
			 	echo"Database not found<BR>";	 
			 }
		}
		else
		{
			echo "not connected";	
		}

	?>
	   
	   
	   <div class="profile_info">
	   
	      <label><b>User Name : <?php echo $r[0]['p_user'] ?></b></label><br>
	      <label><b>Name : <?php echo $r[0]['p_name'] ?></b></label><br>
	      <label><b>Phone no : <?php echo $r[0]['p_phone'] ?></b></label><br>
	      <label><b>Email id : <?php echo $r[0]['p_email'] ?></b></label><br>
	      <label><b>Address : <?php echo $r[0]['p_address'] ?></b></label><br>	   	
	   	
	   </div>
	   
	   <?php
	          // $r=mysql_resultTo2DAssocArray('&sql');
	            // print_r($r);
	
	   ?>
	  

	   

<script src="../bootstrap/jquery.min.js"></script>
 <script src="../bootstrap/bootstrap.js"></script>
</body>
</html>