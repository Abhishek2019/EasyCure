<?php
error_reporting(E_ERROR | E_PARSE);
$hostname = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "easycure";
//$docUserName = $_SESSION["d_userName"];        //ashap1234
echo "<div class='container'>";
/*

    echo"<tr><div class='select'>";
    echo"       <select class='' name='BloodGroup'>";
    echo"         <option value='O-'>O Nagative</option>";
    echo"         <option value='O+'>O Positive</option>";
    echo"         <option value='A-'>A Negative</option>";
    echo"         <option value='A+'>A Positive</option>";
    echo"         <option value='B-'>B Negative</option>";
    echo"         <option value='B+'>B Positive</option>";
    echo"         <option value='AB-'>AB Negative</option>";
    echo"         <option value='AB+'>AB Positive</option>";
    echo"         </select>";
    echo"  </div></tr>";
*/
$conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from bloodbank";


              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                // output data of each row		$row[""]
                echo "<table class='table'>";
                echo "<thead><th>Name</th><th>Contact No</th><th>Blood Group</th><th>Address</th></thead>";

                while($row = mysqli_fetch_assoc($result)) {
                  //echo $row["h_name"];
                  echo "<tr> <td>".$row["name"]."</td> <td>".$row["phone"]."</td><td>".$row["blood_group"]."</td><td>".$row["address"]."</td><tr>";
                }
                echo "</table>";
              }else {
                echo "<center><h1>Blood Donar list is Empty.</h1></center>";
              }


  echo"</div>";

mysqli_close($conn);
?>
