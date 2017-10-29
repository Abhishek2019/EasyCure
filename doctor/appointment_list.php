<?php

    //session_start();
    //error_reporting(E_ERROR | E_PARSE);
    $docUserName = $_SESSION["d_userName"];
    //echo "$docUserName";
    //session_unset();
    //session_destroy();

    $hostname = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "easycure";
  //  $docUserName = "satyam857";        //ashap1234
    $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

	$sql = "SELECT p.p_name, p.p_city, a.date FROM patient p ,appointment a WHERE a.p_user = p.p_user and a.d_user = '$docUserName' and DATE(date) >= CURDATE() ";

                    $result = mysqli_query($conn, $sql);
          					if (mysqli_num_rows($result) > 0) {
          						// output data of each row		$row[""]
                      echo "<table class='table'>";
                      echo "<thead><th>Date</th><th>Name</th><th>City</th></thead>";

          						while($row = mysqli_fetch_assoc($result)) {
          							//echo $row["h_name"];
          							echo "<tr> <td>".$row["date"]."</td> <td>".$row["p_name"]."</td><td>".$row["p_city"]."</td><tr>";
          						}
                      echo "</table>";
          					}else {
          					  echo "<center><h1>Appointments List Is Empty.</h1></center>";
          					}

?>
