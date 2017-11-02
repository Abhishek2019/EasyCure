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




    
    <link rel="stylesheet" href="hospital_list.css">

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

	   		<center><h1>Hospital List</h1></center>
	   		
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
					 $sql="SELECT * FROM hospital";
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
	<br>
<!--
	<div class="parallax">
	<br>
	
	<table id="h_list" align="center" cellpadding="20"  border=0>
	<tr>
		<th>Hospital Name</th>
	</tr>
	
	<?php
	
//		while($rec=mysql_fetch_array($records))
//   	    {
//			
//
//         	echo "<tr>"; 	
//   	    		echo "<td>".$rec['h_name']."</td>";   	    	
//   	        echo "</tr>";
//
//   	  }
	
	?>
	
	
	
	</table>
	<br>
	</div>
-->

       <div id="h_list">


      <div class="row">
        <!--<h1>Choose Yourself</h1>
        <h4>Who are you?</h4>-->
        <br>


        <div class="col-md-4">


          <div class="panel panel-default h_list">

               <div class="panel-heading item1_h_list"></div>
               <div class="panel-body h_list">

                   <h4><b>                           
						  
                     	<?php

								

								if(array_key_exists('test1',$_POST)){
									
									unset($_SESSION['h_user']);
									$_SESSION["h_user"] = $r[0]['h_user'];
									//echo "".$_SESSION["h_user"];
								}

						?>

                   	<a href="h_doc_list.php">
                   	  
                   	   <?php
					    					   					    
	                            
					      echo "".$r[0]['h_name'];
					   	  echo "<BR>";
					      echo "<BR></a>";
						  echo "Email :".$r[0]['h_email'];
					   	echo "<BR>";
						echo "<BR>";
						echo "Phone No. :".$r[0]['h_contact'];
		
					 	?>
                  	                   	                   	
                  	    <br>
                  	    <br>
                  	      <form method="post"><input type="submit" name="test1" id="test1" value=<?php echo "Select"?> ></form>              	                   	               	                   	               	                   	
                   	                   	                   	
                   </b></h4>

               </div>

            </div>

        </div>

                <div class="col-md-4">

            <div class="panel panel-default h_list">

               <div class="panel-heading item2_h_list"></div>
               <div class="panel-body h_list">

                       <h4><b>                            
						  
                     	<?php


								if(array_key_exists('test2',$_POST)){
									
									unset($_SESSION['h_user']);
									$_SESSION["h_user"] = $r[1]['h_user'];
									//echo "".$_SESSION["h_user"];
								}

						?>
						
                     	   <a href="h_doc_list.php">
                      	          	
                      	  <?php
	                           // $_SESSION["h_user"] = $r[1]['h_user'];
					      		echo "".$r[1]['h_name'];
						        echo "<BR>";
						        echo "<BR></a>";
						   		echo "Email :".$r[1]['h_email'];
						   		echo "<BR>";
						        echo "<BR>";
						   		echo "Phone No. :".$r[1]['h_contact'];
		
					 	  ?>
                     	          	<br>
                     	          	<br>
                   <form method="post"  ><input type="submit" name="test2" id="test2" value=<?php echo "select"?>></form>
                       	          	
                       </b></h4>
               </div>

            </div>


        </div>
                <div class="col-md-4">

            <div class="panel panel-default h_list">

               <div class="panel-heading item3_h_list"></div>
               <div class="panel-body h_list">

                      <h4><b>                           
						  
                     	<?php

								function testfun()
								{
								  
									//$_SESSION["h_user"] = $r[2]['h_user'];
									
								}

								if(array_key_exists('test3',$_POST)){
									
									unset($_SESSION['h_user']);
									$_SESSION["h_user"] = $r[2]['h_user'];
									//echo "".$_SESSION["h_user"];
								}

						?>

                     	<a href="h_doc_list.php">
                      	
                      	 <?php
	                            //$_SESSION["h_user"] = $r[2]['h_user'];
						  
						  
					      		echo "".$r[2]['h_name'];
						        
						  		echo "<BR>";
						  		echo "<BR></a>";
						   		echo "Email :".$r[2]['h_email'];
						  		echo "<BR>";
						        echo "<BR>";
						   		echo "Phone No. :".$r[2]['h_contact'];
		
					 	  ?>
                     	 <br>
                     	 <br>
                   <form method="post" ><input type="submit" name="test3" id="test3" value=<?php echo "select"?> ></form>   	 
                      	 
                      </b></h4>
               </div>

            </div>


        </div>



      </div>

       </div>

<br>
<br><br><br><br><br><br><br>

<script src="../bootstrap/jquery.min.js"></script>
 <script src="../bootstrap/bootstrap.js"></script>

</body>
</html>




<!--

<form method="post">
    <input type="submit" name="test" id="test" value="RUN" /><br/>
</form>

<?php

//function testfun()
//{
//   echo "Your test function on button click is working";
//}
//
//if(array_key_exists('test',$_POST)){
//   testfun();
//}

?>
-->