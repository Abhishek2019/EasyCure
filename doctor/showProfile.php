<?php
  //session_start();
    $hostname = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "easycure";
    $docUserName = $_SESSION["d_userName"];        //ashap1234
    $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
      /*Doctor Details*/
    $sql = "SELECT  `d_name`, `d_phone`, `d_email`, `d_degree`, `d_gender`, `d_specalist` FROM `doctor` WHERE `d_user` = '$docUserName' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['d_name']; $phone = $row['d_phone']; $email = $row['d_email']; $degree = $row['d_degree'];
    $gender= $row['d_gender']; $specialist = $row['d_specalist'];
      /*Hospital Details*/
      $sql = "SELECT * FROM `doc_schedule` WHERE d_user = '$docUserName' ";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $fees = $row['fees'];
      $sun = $row['sun']; $mon = $row['mon']; $tue = $row['tue']; $wed = $row['wed']; $thu = $row['thu']; $fri = $row['fri']; $sat = $row['sat'];

      $sql = "SELECT h_name FROM hospital WHERE h_user=(SELECT h_user from doc_list where d_user='$docUserName')";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $hospitalName = (!empty($row['h_name'])) ? $row['h_name'] : 'NA';
      mysqli_close($conn);
 ?>

<div class="container">

  <table class='table'  align="center" border="0">
  <thead><tr><th><label for="">Name </label></th> <th> <label for=""><?php echo $name; ?> </label> </th></tr></thead>
  <thead><tr><th><label for="">User Name</label></th> <th><label for=""><?php echo $docUserName; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Gender</label></th> <th><label for=""><?php echo $gender; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Phone No</label></th> <th><label for=""><?php echo $phone; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Email id </label></th> <th><label for=""><?php echo $email; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Working </label></th> <th><label for=""><?php echo $hospitalName; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Degree</label></th> <th><label for=""><?php echo $degree; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Specialist</label></th> <th><label for=""><?php echo $specialist; ?></label></th></tr></thead>
  <thead><tr><th><label for="">Fees</label></th> <th><label for=""><?php echo $fees; ?></label></th></tr></thead>
  </table>
   <center><b> Daily Shedule</b></center>
  <table class='table'  align="center" cellpadding="0">
    <thead>
        <tr><th>Sunday</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednusday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
        </tr>
    </thead>
        <tr>
            <td><label for=""><?php echo $sun; ?></label></td>
            <td><label for=""><?php echo $mon; ?></label></td>
            <td><label for=""><?php echo $tue; ?></label></td>
            <td><label for=""><?php echo $wed; ?></label></td>
            <td><label for=""><?php echo $thu; ?></label></td>
            <td><label for=""><?php echo $fri; ?></label></td>
            <td><label for=""><?php echo $sat; ?></label></td>
        </tr>
  </table>

</div>
