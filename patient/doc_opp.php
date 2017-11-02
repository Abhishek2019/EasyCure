<?php
 
 
session_start();

?>


<!doctype html>
<html>
<head>


 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-control" content="no-cache">
   
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
  

    <link rel="stylesheet" href="../bootstrap/bootstrap.css">




    
    <link rel="stylesheet" href="doc_opp.css">

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
              	   
              	   <ul class="nav navbar-nav navbar-right">  
              	    <li class="">
						 <a href="p_logout.php"><b>Logout</b></a>

              	    </li>
              	   </ul>

              </div>

          </div>

       </div>


       <div id="main_title">  
       <br>

	   		<center><h1>Doctor Appointment List</h1></center>
	   		
	   </div>	

 <?php
	
		$conn = mysql_connect("localhost","root","");	
		if($conn)
		{
			//echo "connected";
			echo "<BR>";
			
			$d=$_SESSION['d_user'];
			
			 if( mysql_select_db('easycure'))
             {
			 	//echo "Database found <BR>";
					 $sql="SELECT * FROM doctor where d_user='$d'";
				 $sql1="SELECT * FROM doc_schedule where d_user='$d'";
   	  				//$sql="DELETE FROM  patient WHERE name='$name'";
   	  				$records=mysql_query($sql);
              $records1=mysql_query($sql1);
				 
				 
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
         $r1=mysql_resultTo2DAssocArray($records1);
        // print_r($r1);
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
	<br>
	
	<center><h2><b><?php echo "Dr. ".$r[0]['d_name']." Appointments"; ?></b></h2></center>
	
  <div class="d_opp_list">

    <div class="list-group">

        <a href="" class="list-group-item"><h2> <?php  echo "Monday :".$r1[0]['mon'] ?>  </h2>
        
        
        
        
<!--
        <form method="post">
        	
        	<input type="submit" name="1" value="select">
        </form>
        
-->
        
                             	<?php	

//								if(array_key_exists('1',$_POST)){
//									
//									unset($_SESSION['h_user']);
//									$_SESSION["h_user"] = $r[0]['h_user'];
//									//echo "".$_SESSION["h_user"];
//								}
						?>
        
        
        
        </a>

        <a href="" class="list-group-item"><h2> <?php  echo "Tuesday :".$r1[0]['tue'] ?>  </h2></a>
        
        
        
        
        <a href="" class="list-group-item"><h2> <?php  echo "Wednesday :".$r1[0]['wed'] ?>  </h2></a>
        <a href="" class="list-group-item"><h2> <?php  echo "Thrsday :".$r1[0]['thur'] ?>  </h2></a>
        <a href="" class="list-group-item"><h2> <?php  echo "Friday :".$r1[0]['fri'] ?>  </h2></a>
        <a href="" class="list-group-item"><h2> <?php  echo "Saturday :".$r1[0]['sat'] ?>  </h2></a>
        <a href="" class="list-group-item"><h2> <?php  echo "Sunday :".$r1[0]['sun'] ?>  </h2></a>

    </div>
    
    <form method="post">
    
       <input type="date" name="dates" min=<?php   error_reporting(E_ALL ^ E_WARNING);  echo "".date('Y-m-d'); ?>  max=<?php   error_reporting(E_ALL ^ E_WARNING);  echo "".date('Y-m-d',  strtotime('+4 days')); ?>>
       
       <br>
       <br>
       
       <input type="submit" name="final_book" value="Book Appointment">
        <br>
       <br> 
 
    	
    </form>
    
    <?php 
	  error_reporting(E_ALL ^ E_WARNING); 
			//echo date('Y-m-d',  strtotime('+4 days')); 

			if(array_key_exists('final_book',$_POST))
			{
				
				$d= "".$_SESSION["d_user"];
				$p= "".$_SESSION["p_user"];
				
				$da= $_POST['dates'];
				
				$sql_book="INSERT INTO appointment VALUES ('$p', '$d', '$da')";
				
				mysql_query($sql_book);
				
				echo "<script>alert('Your Appointment is Booked')</script>";

								
			}
			
			
    ?>
    
    
    
  </div>




<!--
	<div class="parallax">
	<br>
	
	<table id="h_list" align="center" cellpadding="20"  border=0>
	<tr>
		<th>Hospital Name</th>
	</tr>
	

	
	
	</table>
	<br>
	</div>
-->





<script src="../bootstrap/jquery.min.js"></script>
 <script src="../bootstrap/bootstrap.js"></script>

</body>
</html>

