<?php include("connection.php"); 
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include_once("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Details</title>
  <style>
       body {
            background-image: url('images/cases2.png');
            background-size: cover;
            background-position: center;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            max-width: 500px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        h1 {
            text-align: center;
        }

        .hospital-details {
            width: 100%;
            margin: 30px auto;
            border-collapse: collapse;
        }

        .hospital-details th, .hospital-details td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .hospital-details th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .btn {
            margin: 5px 0;
        }
  </style>
</head>
<body>
<div class="container">
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $hospitalId = $_GET['id'];

    $query = "SELECT * FROM tbl_hospital WHERE id = $hospitalId";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hospitalName = $row['Name'];
        $hospitalEmail = $row['Email'];
        $hospitalAddress = $row['Address'];
        $hospitalNumber = $row['Contact'];

        echo '<h1>Hospital Details</h1>';
        echo '<table class="hospital-details">';
        echo '<tr><th>Name</th><td>' . $hospitalName . '</td></tr>';
        echo '<tr><th>Email</th><td>' . $hospitalEmail . '</td></tr>';
        echo '<tr><th>Address</th><td>' . $hospitalAddress . '</td></tr>';
        echo '<tr><th>Contact Number</th><td>' . $hospitalNumber . '</td></tr>';
        echo '<tr><td ><a href="appointment.php?id=' . $hospitalId . '" class="btn btn-primary">Make Appointment</a></td></tr>';
        echo '<tr><td ><a href="covid_test.php?id=' . $hospitalId . '" class="btn btn-success">Apply For COVID Test</a></td></tr>';
        echo '</table>';
    } else {
        echo "Hospital details not found";
    }
}
?>
</div>
</body>
</html>

</body>
</html>
