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
    <title>P_profile</title>
   
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
  

    <link rel="stylesheet" href="../bootstrap/bootstrap.css">




    
    <link rel="stylesheet" href="h_doc_list.css">


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
						 <a href="p_profile.php"><b>Your Profile</b></a>

              	    </li>
              	   </ul>



              </div>

          </div>

       </div>
       
       
       
       
       <div id="main_title">  
       <br>

	   		<center><h1>Doctors List</h1></center>
	   		
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
				 
				 $h=$_SESSION['h_user'];
				 
				 
				 
				
					 $sql="SELECT * FROM hospital where h_user='$h'";
				 $sql1="SELECT * FROM doc_list where h_user='$h'";
				 
				 
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
				 
				
                 	
						
				 
				 //echo "".$count_doc;
				 //print_r($r1);
				//print_r(mysql_resultTo2DAssocArray($records));
				 
				 //  PNR:: 8664197743

				

	?>
	<br>
<?php
					

					
?>
	   
	   <center><h2><b><?php echo "Welcome To ".$r[0]['h_name']." Hospital"; ?></b></h2></center><br><br><br>
	   

	   <div class="d_list">
	   
	     <div class="list-group">
     	  
     	  <?php 
					
				 
				  $count_doc=count($r1);
				 //echo "".$count_doc;
				 $z=0;
				 //echo ($r1[1]['d_user']);
				 while($z<$count_doc)
				{
					 
					$h2=$r1[$z]['d_user'];
					//echo "<BR>";
					//echo "".$h2;					
				
					
					 $sql2="SELECT * FROM doctor where d_user='$h2'";

					 $records2=mysql_query($sql2);

					 $r2=mysql_resultTo2DAssocArray($records2);
					//print_r($r2);
					//echo "<BR>";

				 

			 ?>
	     	  
			 <a href="doc_opp.php" class="list-group-item">
			 
				 
					 <h2 class="list-group-item-heading">
					 	
					 	<?php echo "Dr.".$r2[0]['d_name'] ?>
					 	
					 </h2>		 	 
					 <p class="list-group-item-text"><h3>

						<?php
				 
				            echo "contact no.".$r2[0]['d_phone'];
					        
					          echo "<BR>";
					
					
					   
				            echo "Email id : ".$r2[0]['d_email'];
					        
					          echo "<BR>";
					  
				 
				        ?>
						
					 </h3></p>
					 
				 
					 <br>
					 
					 <?php

								if(array_key_exists( $z,$_POST)){
									
									unset($_SESSION['d_user']);
									$_SESSION["d_user"] = $r2[0]['d_user'];
									echo "".$_SESSION["d_user"];
								}
					else{
						echo "no";
					}
					//echo "".$z;
					//echo '$z';

						?>
					 
					 
					 <form method="post"><input type="submit" name=<?php echo "".$z ?> value=<?php echo "Select"?> ></form>

					 </a>


			 
	        
	           <?php 
				
						$z++;
				 }
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
	        
			</div>  	  
	     	  	
	     </div>
	     	  
	   </div>
	   	
	   </div>
	   

	   
<script src="../bootstrap/jquery.min.js"></script>
 <script src="../bootstrap/bootstrap.js"></script>
</body>
</html>







