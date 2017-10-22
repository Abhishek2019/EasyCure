<?php




$sql = "SELECT username FROM ";
$result = mysql_query($sql);

echo "<select name='username'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['username'] ."'>" . $row['username'] ."</option>";
}
echo "</select>";
?>

<div class="container">

    <div class="select">
            <select class="" name="BloodGroup">
              <option value="O-">O Nagative</option>
              <option value="O+">O Positive</option>
              <option value="A-">A Negative</option>
              <option value="A+">A Positive</option>
              <option value="B-">B Negative</option>
              <option value="B+">B Positive</option>
              <option value="AB-">AB Negative</option>
              <option value="AB+">AB Positive</option>
            </select>
    </div>

</div>
