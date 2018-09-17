<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>fli chartJS demo</title>
  </head>
  <body class="alert-warning">

    <div class="m-5">
      <div class="card col-md-5 offset-md-3">
        <canvas id="myChart"></canvas>
      </div>
    </div>

<?php
  include 'dbconfig.php';

  // Create connection
  $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  //echo "Connected successfully";

  $sql = "SELECT * FROM chartjs";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $charttype = $row["charttype"];
        $chartdata = $row["chartdata"];
        $chartlabel = $row["chartlabel"];
        $chartbackgroundcolor = $row["chartbackgroundcolor"];
        $chartbordercolor = $row["chartbordercolor"];
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);
?>

<?php $jsonready = json_encode(explode(",",$chartdata)); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script>

      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: "<?php echo $charttype; ?>",

      // The data for our dataset
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "<?php echo $chartlabel; ?>",
            backgroundColor: "<?php echo $chartbackgroundcolor; ?>",
            borderColor: "<?php echo $chartbordercolor; ?>",
            data: <?php echo $jsonready ?>,
          }]
        },

      // Configuration options go here
      options: {}
      });

    </script>
  </body>
</html>
