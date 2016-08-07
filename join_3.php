<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">

<title>
  show me the birds
</title>

<link rel="stylesheet" href="birdstyles.css"/>

</head>

<body>
  <?php include('header_index.php'); ?>
  <div class="flexOuter">
    <?php include('nav.php'); ?>
    <div class="flexInnerMain">
<?php
require('mysql_connect_birds.php');
$q = "SELECT birds.bird_name, birds.best_time, location.location,
      rsv_info.bird_blinds, rsv_info.enter_memb, rsv_info.enter_nonmemb
      FROM birds INNER JOIN location ON birds.bird_id=location.bird_id
      INNER JOIN rsv_info ON location.location_id = rsv_info.location_id";
$result = @mysqli_query($dbcon, $q);
if ($result) {
  echo '<table>
          <tr>
            <td><b>name</b></td>
            <td><b>best time</b></td>
            <td><b>location</b></td>
            <td><b>bird blinds?</b></td>
            <td><b>member fee</b></td>
            <td><b>nonmember fee</b></td>
          </tr>';
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     echo '<tr>
             <td>' . $row['bird_name'] . '</td>
             <td>' . $row['best_time'] . '</td>
             <td>' . $row['location'] . '</td>
             <td>' . $row['bird_blinds'] . '</td>
             <td>' . $row['enter_memb'] . '</td>
             <td>' . $row['enter_nonmemb'] . '</td>
           </tr>';
   }
   echo '</table>';
   mysqli_free_result($result);
} else {
  echo '<p class="error">data could not be accessed</p>';
  echo '<p>' . mysqli_error($dbcon) . '<br/><br/>query:' . $q . '</p>';
}
mysqli_close($dbcon);
?>
    </div>
    <?php include('sidebar.php'); ?>
  </div>

</body>

<script src="#">
</script>

</html>
