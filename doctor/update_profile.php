<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$docUserName = $_SESSION["d_userName"];

/*
echo $docUserName.'<br>';
echo $new_name.'<br>';
echo $new_phone.'<br>';
echo $new_email.'<br>';
echo $new_degree.'<br>';
echo $new_specialist.'<br>';

echo $new_sun.'<br>';
echo $new_mon.'<br>';
echo $new_tue.'<br>';
echo $new_wed.'<br>';
echo $new_thu.'<br>';
echo $new_fri.'<br>';
echo $new_sat.'<br>';
*/

if(empty($new_name) && empty($new_phone) && empty($new_email) && empty($new_degree) && empty($new_specialist)){

  $new_name = $_POST['name']; $new_phone = $_POST['phone']; $new_email = $_POST['email']; $new_degree = $_POST['degree']; $new_specialist = $_POST['specialist'];
  $new_fees = $_POST['fees'];
  $new_sun = (!empty($_POST['sun'])) ? $_POST['sun'] : 'NULL';
  $new_mon = (!empty($_POST['mon'])) ? $_POST['mon'] : 'NULL';
  $new_tue = (!empty($_POST['tue'])) ? $_POST['tue'] : 'NULL';
  $new_wed = (!empty($_POST['wed'])) ? $_POST['wed'] : 'NULL';
  $new_thu = (!empty($_POST['thu'])) ? $_POST['thu'] : 'NULL';
  $new_fri = (!empty($_POST['fri'])) ? $_POST['fri'] : 'NULL';
  $new_sat = (!empty($_POST['sat'])) ? $_POST['sat'] : 'NULL';

  $hostname = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "easycure";
  $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT h_user from doc_list where d_user='$docUserName'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $hospitalUserName =  $row['h_user'];

  $sql1 = "UPDATE `doctor` SET `d_name`= '$new_name', `d_phone`= '$new_phone', `d_email`= '$new_email', `d_degree`= '$new_degree', `d_specalist`= '$new_specialist'  WHERE `doctor`.`d_user` = '$docUserName';";

  if ($_POST['isNew'] == 'Y') {
    $sql2 = "INSERT INTO `doc_schedule` (`d_user`, `h_user`, `fees`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat`) VALUES ('$docUserName', '$hospitalUserName', '$new_fees', '$new_sun', '$new_mon', '$new_tue', '$new_wed', '$new_thu', '$new_fri', '$new_sat')";
  }else {
    $sql2 = "UPDATE `doc_schedule` SET `fees`='$new_fees',`sun`='$new_sun',`mon`='$new_mon',`tue`='$new_tue',`wed`='$new_wed',`thu`='$new_thu',`fri`='$new_fri',`sat`='$new_sat' WHERE d_user = '$docUserName'; ";
  }

  if(mysqli_query($conn, $sql1)){
    if(mysqli_query($conn, $sql2)){
        echo "<script>alert('Profile updated successfully')</script>";
    }else{
        echo "<script>alert('Updation failed Try Again.')</script>";
    }
  }else{
      echo "<script>alert('Updation failed Try Again.')</script>";
  }

  mysqli_close($conn);

}

echo "<script> window.location.href = 'DoctorProfile.php'; </script>";

?>
