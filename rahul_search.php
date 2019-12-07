<?php include('include/db.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 4 Bootstrap Links -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<!-- Jquery Links For Search Box -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Jquery Links For Search Box -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <title>Search In between Stations</title>

  </head>
  <body>
    <div class="row">
    <h2 style="font-family: 'Pacifico', cursive" align="center">TheTrains.in/indicator</h2>

      <div class="container">
        <form class="form-inline" class="" action="featchingDBresultasarry.php" method="post">

        <!-- First DropDown -->
              <select class="form-control mt-2 chosen" name="Drop" class="selectpicker" id="selectStart" data-width="100px">
                <?php
                  $sqlquery = "SELECT * FROM stations";
                  $sqltran = mysqli_query($con, $sqlquery)or die(mysqli_error($con));
                  while ($rowList = mysqli_fetch_array($sqltran)) {
                    echo "<option value='".$rowList["station_name"]."'>" .$rowList["station_name"]. "</option>";
                  }
                ?>
              </select><br><br>
        <!-- Another DropDown here -->
              <select class="form-control chosen" name="Drop2" class="selectpicker" id="selectDestination" data-width="100px">
                <?php
                  $sqlquery = "SELECT * FROM stations";
                  $sqltran = mysqli_query($con, $sqlquery)or die(mysqli_error($con));
                  while ($rowList = mysqli_fetch_array($sqltran)) {
                    echo "<option value='".$rowList["station_name"]."'>" .$rowList["station_name"]. "</option>";
                  }
                ?>
              </select><br><br>
        <!-- Submit button here -->
              <button class="btn btn-info" type="sumbit" name="button">Submit</button>
            </form>

      </div>
      <div class="container">
        <?php
        $startPoint =  $_POST["Drop"];
        $endPoint =  $_POST["Drop2"];
        echo "You are at: "."<strong> " . $startPoint . "</strong>"."<br>";
        echo "Destination: "."<strong>".$endPoint."</strong>";
         ?>

      </div>

   </div><br>

<div class="container bg-info mb-2" align="center">
  <?php
   if(isset($_REQUEST['button'])){
  $value1 = mysqli_query($con,"SELECT rank FROM stations WHERE station_name='$startPoint'");
  $a = mysqli_fetch_array($value1);
  $b = $a[0]; //$b: This will print "rank" of "You are at:"
  $value2 = mysqli_query($con,"SELECT rank FROM stations WHERE station_name='$endPoint'");
  $x = mysqli_fetch_array($value2);
  $y=$x[0]; //$y: This will print "rank" of "Destination:"
  $final = mysqli_query($con,"SELECT station_name,intervaltime FROM stations WHERE rank BETWEEN $b AND $y");
  $rada = mysqli_query($con,"SELECT station_name,intervaltime FROM stations WHERE rank BETWEEN $y AND $b ORDER BY ID DESC");
  echo "<table class = 'table table-bordered'>
  <tr>
  <th>Station Name</th>
  <th>INterval time</th>
  </tr>
  ";
  while ($res=mysqli_fetch_array($final)) {
    echo "<tr> <td> ".$res['station_name']."</td><td> ".$res['intervaltime']." </td></tr>";
  }
  while ($resu=mysqli_fetch_array($rada)) {
    echo "<tr> <td> ".$res['station_name']."</td><td> ".$res['intervaltime']." </td></tr>";
  }
// Below table is for available Trains
  echo "<table class = 'table table-bordered'>
  <tr>
  <th>From</th>
  <th>Destination</th>
  <th>Start Time</th>
  <th>Destination Time</th>
  </tr>
  ";
  if ($b>$y) {
    $getTrainsList = "SELECT * FROM trains WHERE start = 'panvel'";
    $ResultgetTrainsList = mysqli_query($con,$getTrainsList);
    while ($resResultgetTrainsList = mysqli_fetch_assoc($ResultgetTrainsList)) {
      $start = $resResultgetTrainsList['start'];
      $destination = $resResultgetTrainsList['destination'];
      $start_time = $resResultgetTrainsList['start_time'];
      $destination_time = $resResultgetTrainsList['destination_time'];
      echo"
      <tr>
      <td>$start </td>
      <td>$destination </td>
      <td>$start_time </td>
      <td>$destination_time </td>
      </tr>
      ";
    }
  }else {
    $getTrainsList = "SELECT * FROM trains WHERE start = 'csmt'";
    $ResultgetTrainsList = mysqli_query($con,$getTrainsList);
    while ($resResultgetTrainsList = mysqli_fetch_assoc($ResultgetTrainsList)) {
      $start = $resResultgetTrainsList['start'];
      $destination = $resResultgetTrainsList['destination'];
      $start_time = $resResultgetTrainsList['start_time'];
      $destination_time = $resResultgetTrainsList['destination_time'];
      echo"
      <tr>
      <td>$start </td>
      <td>$destination </td>
      <td>$start_time </td>
      <td>$destination_time </td>
      </tr>
      ";
    }
  }
  echo"</table>";
}
   ?>


</div>

<?php
$currentTime =  date("h:i A");
echo $currentTime .'<br>';
$query3 = "SELECT start_time FROM trains";
$resofquery3 = mysqli_query($con, $query3);
if ($currentTime>$resofquery3) {
  while ($rowList3 = mysqli_fetch_array($resofquery3)) {
    echo $rowList3['start_time'] .'<br>';
  }
}
else {
  while ($rowList3 = mysqli_fetch_array($resofquery3)) {
    echo 'this is the sec'. $rowList3['start_time'] .'<br>';
  }
}
?>
 <script type="text/javascript">$(".chosen").chosen();</script>
  </body>
</html>