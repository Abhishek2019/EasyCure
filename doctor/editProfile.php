<?php
    $hostname = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "easycure";
    $docUserName = $_SESSION["d_userName"];        //ashap1234
    $conn = mysqli_connect($hostname, $dbuser, $dbpass, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT  `d_name`, `d_phone`, `d_email`, `d_degree`, `d_specalist` FROM `doctor` WHERE `d_user` = '$docUserName' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['d_name']; $phone = $row['d_phone']; $email = $row['d_email']; $degree = $row['d_degree']; $specialist = $row['d_specalist'];

    $sql = "SELECT COUNT(d_user) As isThere,`fees`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`, `sat` FROM `doc_schedule` WHERE d_user = '$docUserName' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $fees = $row['fees']; $sun = $row['sun']; $mon = $row['mon']; $tue = $row['tue']; $wed = $row['wed']; $thu = $row['thu']; $fri = $row['fri'];
    $sat = $row['sat']; $isThere = $row['isThere'];

    mysqli_close($conn);
?>

<div class="container">

    <form class="" action="update_profile.php" method="post">

        <table class='table'  align="center" border="0">
        <thead><tr><th><label for="">Name </label></th> <th><input type="text" id="name" name="name" value="<?php echo $name; ?>" required></th></tr></thead>
        <thead><tr><th><label for="">Phone No</label></th> <th><input type="number" id="phone" name="phone" value="<?php echo $phone; ?>" required onfocusout="return checkPhone(this.value)" ></th></tr></thead>
        <thead><tr><th><label for="">Email id </label></th> <th><input type="email" id="email" name="email" value="<?php echo $email; ?>" required></th></tr></thead>
        <thead><tr><th><label for="">Degree</label></th> <th><input type="text" id="degree" name="degree" value="<?php echo $degree; ?>" required></th></tr></thead>
        <thead><tr><th><label for="">Specialist</label></th> <th><input type="text" id="specialist" name="specialist" value="<?php echo $specialist; ?>" required></th></tr></thead>
        <thead><tr><th><label for="">Fees</label></th> <th><input type="number" id="fees" name="fees" value="<?php echo $fees; ?>" required ></th></tr></thead>
        </table>
        <label align="center" for=""><b>&nbsp&nbsp&nbsp Shedule :</b></label>
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
                  <td><input type="text" name="sun" value="<?php echo $sun; ?>"></td>
                  <td><input type="text" name="mon" value="<?php echo $mon; ?>"></td>
                  <td><input type="text" name="tue" value="<?php echo $tue; ?>"></td>
                  <td><input type="text" name="wed" value="<?php echo $wed; ?>"></td>
                  <td><input type="text" name="thu" value="<?php echo $thu; ?>"></td>
                  <td><input type="text" name="fri" value="<?php echo $fri; ?>"></td>
                  <td><input type="text" name="sat" value="<?php echo $sat; ?>"></td>
              </tr>
        </table>
        <input type="hidden" name="isNew" value="<?php  print(($isThere == 0) ? 'Y': 'N'); ?>">
        <input class="button" type="submit" value="Submit" style="width:100%"><br><br><br>
    </form>
</div>

<style media="screen">
  input{
    width:90%;
    padding: 5px 5px;
  }
</style>

<script>
function checkPhone(x){
  if(x.toString().length != 10){
     alert('Phone Number Must have 10 Digits.');
    return false;
  }
}
</script>
