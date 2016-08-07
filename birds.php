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
$q = "SELECT bird_name, rarity, best_time FROM birds ORDER BY bird_name ASC";
$result = @mysqli_query($dbcon, $q);
if ($result) {
  echo '<table>
          <tr>
            <td><b>name</b></td>
            <td><b>rarity</b></td>
            <td><b>best time</b></td>
          </tr>';
   while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     echo '<tr>
             <td>' . $row['bird_name'] . '</td>
             <td>' . $row['rarity'] . '</td>
             <td>' . $row['best_time'] . '</td>
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
